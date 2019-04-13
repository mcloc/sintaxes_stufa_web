#!/bin/bash
php artisan cache:clear
php artisan config:cache
php artisan config:cache
composer dump-autoload
