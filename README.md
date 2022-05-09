# has-to-be charging process app

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
- set APP_URL in .env file
- run: *php artisan serve* (http://127.0.0.1:8000)
- run: *php artisan l5-swagger:generate* 
    - api documentation will be available at {APP_URL}/api/documentation
# Tests
- run: *php artisan test*

# Suggestions (Challenge 2)
- adding version to our api (api/v1/rate) - (also adding _api_ to the URI that is added by default in the Laravel)
- adding an output model to uniform responses, it's also possible to separate error and success response's model 
(as I added (demo version) in try-catch part of _rate_ method in _RatingController_)
- adding related resource in URI (here it can be _charging-processes_ : _api/v1/charging-processes/rate_)
