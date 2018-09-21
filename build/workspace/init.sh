#!/usr/bin/env bash
cd /var/www

/usr/local/bin/composer.phar install

php artisan migrate

/sbin/my_init
