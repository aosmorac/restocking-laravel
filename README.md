# Restocking - Test

Docker Nginx, PHP 7.2 and Laravel

# Test it
http://ec2-34-229-128-17.compute-1.amazonaws.com:8080

Admin
email: admin@testabel.com
password: 123456

Worker
email: worker@testabel.com
password: 123456

The test content was create using laravel factories, just admin can create new items inside lists, and workers and admin can change amount and status.

# Run App

In order to run this app in your pc you must do:

### Clone Git
```sh
git clone https://github.com/aosmorac/restocking-laravel.git
```

### Run docker
```sh
cd restocking-laravel/
docker-compose up
```

### Installing packages
Go into docker container
```sh
docker exec -i -t restocking bash
```
Then, inside the continer
```sh
cd restocking
npm install
composer install
```
### Config
Create the file .env with connectios config. The file must be

>APP_NAME=Restocking
APP_ENV=local
APP_KEY=base64:O+5u9ET0t5y6S73Xa6Qay7cbWfBxRBt0g7DVHTGLAQQ=
APP_DEBUG=true
APP_URL=http://localhost
>
>LOG_CHANNEL=stack
>
>DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=DBName
DB_USERNAME=DBUser
DB_PASSWORD=DBUserPassword
>
>BROADCAST_DRIVER=log
CACHE_DRIVER=file
SESSION_DRIVER=file
SESSION_LIFETIME=120
QUEUE_DRIVER=sync
>
>REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379
>
>MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
>
>PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1
>
>MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"

### Data Base

To inicialize the tables into your database just you have to do
```sh
php artisan migrate
```

### Unit test
I am using phpunit, I have created 2 aliases, p for phpunit and pf for phpunit --filter

If you want run test you just have to go to folder restocking (/code/restocking) and run
```sh
p
```

### Test Data
In order to test the app you must to create content using the factories. Inside docker and in the project folder you must to do:

Go into tinker
```sh
php artisan tinker
```
Create dummy data
```sh
$lists = factory('App\Rlist', 2)->create();
$lists->each(function($list){$items = factory('App\Item', 10)->create(['list_id' => $list->id]); });
```

### Using App
The url is http://localhost:8080/ 
You must register a new user;

In order to have a user admin and create new items the rol field in user table must be 1.




