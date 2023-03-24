#!/bin/sh

cd /var/www

# php artisan migrate:fresh --seed
php ./src/artisan cache:clear
php ./src/artisan route:cache

/usr/bin/supervisord -c /etc/supervisord.conf
