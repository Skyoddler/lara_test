#!/bin/bash

cd /var/www/html || echo 'Wrong execute path.'

# Run npm install
echo "Running npm install..."

# Check if npm install succeeded
if npm install; then
    echo "npm install completed successfully."

    # Run npm run dev
    echo "Running npm run dev..."
    npm run dev

    if npm run dev; then
        echo "npm run dev completed successfully."
    else
        echo "npm run dev failed."
    fi
else
    echo "npm install failed."
fi