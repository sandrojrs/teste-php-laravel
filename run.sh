#!/bin/sh
 
php artisan migrate:fresh --seed
php artisan key:generate
php artisan config:cache
php artisan test
php artisan serve --host=0.0.0.0 --port=80

