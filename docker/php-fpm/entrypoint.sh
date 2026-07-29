#!/bin/sh
set -e

rm -f /var/www/public/hot

# Copy initial storage structure if storage directory is empty
# This ensures Laravel storage directories exist on first run
if [ -z "$(ls -A /var/www/storage)" ]; then
    cp -r /var/www/storage-init/. /var/www/storage/
    chown -R www-data:www-data /var/www/storage
fi

# Ensure storage and bootstrap/cache directories are writable
chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# Run Laravel cache warm-up commands
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Execute the main container command (php-fpm)
exec "$@"
