#!/bin/bash

if [! -f "vendor/autoload.php" ]; then
    composer install --no-progress --no-interaction
fi

if [! -f ".env"]; then
    echo "Creating  env file for env $APP_ENV"
    cp .env.example .env

else
    echo "env file exists."
fi


 
php artisan migrate
php artisan key:generate
php artisan cache:clear
php artisan config:clear
php artisan route:clear

# Run npm run dev
npm run dev

php artisan serve --port=$PORT --host=0.0.0.0 --env=.env
exec docker-php-entrypoint "$@"

# To Run Queue use role variable to control the code above as code below

#variable
# role=${CONTAINER_ROLE:-app}

# if [ "$role" "app" ];then
#     php artisan migrate
#     php artisan key:generate
#     php artisan cache:clear
#     php artisan config:clear
#     php artisan route:clear

#     php artisan serve --port=$PORT --host=0.0.0.0 --env=.env
#     exec docker-php-entrypoint "$@"
# elif [ "$role" "queue" ];then
#     echo "Running the queue..."
#     php /var/www/artisan queue:work --verbose --tries=3 --timeout=1
# fi 