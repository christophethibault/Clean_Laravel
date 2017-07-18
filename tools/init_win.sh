#!/bin/bash
if [ -e "storage/logs/laravel.log" ]; then
  echo "" > storage/logs/laravel.log
fi
composer.phar install --no-progress
npm install --no-bin-links
npm install gulp-sass -g --no-bin-links
npm install gulp -g --no-bin-links
npm install bower -g --no-bin-links
bower install --allow-root
gulp
