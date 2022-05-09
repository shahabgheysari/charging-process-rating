# has-to-be charging process app

# Deployment instructions
# Running app
use one of the following choices:
consider that default port for first two is *8000*
#### run the all commands in the **root of the project**

## docker (production usage)
- install docker & docker-compose
- run this command: *docker-compose up*
## Laravel (development usage)
- install php V8.0
- install the Laravel required php extensions
- install composer (https://getcomposer.org/)
    - run: *composer install* 
- clone .env.example file and name .env
- run: *php artisan key:generate --ansi* (for docker this will be done automatically)
- run: *php artisan serve* (http://127.0.0.1:8000)

#Tests
- run: *php artisan test*
