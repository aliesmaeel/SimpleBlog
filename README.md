### **Installation with docker**

1. ###### **Clone the project**

  ` git clone https://github.com/aliesmaeel/SimpleBlog.git`

###### 2. Run 

`composer install`

###### 3. Navigate into project folder using terminal and run

`docker run --rm \
-u "$(id -u):$(id -g)" \
-v "$(pwd):/var/www/html" \
-w /var/www/html \
laravelsail/php82-composer:latest \
composer install --ignore-platform-reqs`

###### 4. Copy .env.example into .env

   `cp .env.example .env`

###### 5. Start the project in detached mode

  ` ./vendor/bin/sail up -d`

  If you want to run artisan command you should do this from the container.
     Access to the docker container

`./vendor/bin/sail bash`

###### 6. Set encryption key

`   php artisan key:generate --ansi`

###### 7. Run migrations

  ` php artisan migrate`
  ###### 8. Add Filament Admin user

  ` php artisan make:filament-user`
