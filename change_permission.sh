#!/bin/bash -e
echo "Changing permission of host copy of app/Model in container, /var/www/html/Model for reads and writes"
chmod -R 777 /var/www/html/Model
echo "Starting apache service"
exec apache2-foreground 