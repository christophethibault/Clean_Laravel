#!/bin/bash
# Composer
composer.phar selfupdate
composer.phar update
composer.phar dumpautoload

#Npm
npm prune
npm install

# Bower
bower install --allow-root


#Gulp
gulp

# Php artisan
php artisan migrate
php artisan cache:clear
php artisan config:clear
php artisan view:clear

# Maj répertoires au cas où
cd /home/vagrant
sudo su
chown -R vagrant:vagrant .cache/
chown -R vagrant:vagrant .composer/
chown -R vagrant:vagrant .config/
chown -R vagrant:vagrant .local/

#./install-event-js.sh
