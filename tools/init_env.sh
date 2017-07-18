#!/bin/bash
if [ -e "storage/logs/laravel.log" ]; then
  echo "" > storage/logs/laravel.log
fi

if [ -d "/home/vagrant/Code/node_modules" ];then
    cd /home/vagrant/Code/node_modules
    rm -R *
fi

cd /home/vagrant/Code

composer.phar install --no-progress
npm update
npm install gulp-sass -g
npm install gulp -g
npm install bower -g
bower install --allow-root
gulp

mkdir bootstrap/cache storage storage/framework
cd storage/framework
mkdir sessions views cache
cd ../..

php artisan cache:clear
php artisan config:clear
php artisan view:clear
php artisan migrate

cd /home/vagrant
chown -R vagrant:vagrant .cache/
chown -R vagrant:vagrant .composer/
chown -R vagrant:vagrant .config/
chown -R vagrant:vagrant .local/