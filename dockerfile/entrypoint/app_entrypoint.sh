#!/bin/bash

cd /var/www/html || echo 'Wrong execute path.'

# Run npm install
echo "Running composer install..."

# Check if npm install succeeded
if composer install; then
    echo "composer install completed successfully."
else
    echo "composer install failed."
fi