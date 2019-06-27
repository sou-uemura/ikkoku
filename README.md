# docker-laravel5

original https://github.com/ucan-lab/docker-laravel5

## Usage

Create your laravel application.

### Git clone

```
$ git clone git@github.com:hanachan1026/docker-laravel5.git
$ cd docker-laravel5
```

Copy `docker` to your laravel project.

Copy `docker-compose.yml` to your laravel project.

Copy `.env.example` parameters to your laravel `.env`

Edit `.env` parameters for your project.

### Docker compose build & up

```
$ docker-compose up -d
```

http://127.0.0.1:3500

## Description

Build Laravel's development environment using docker.
PHP7.3/MySQL5.7/nginx/composer/redis/node

## Other Usage

### Running Migrations

```
$ docker-compose exec app ash -l
$ sed -i -e "s/DB_HOST=.*/DB_HOST=db/" .env
$ php artisan migrate
```

### Running Testings

```
$ docker-compose exec app ash -l
$ cp .env.example .env.testing
$ php artisan key:generate --env testing
$ sed -i -e "s/DB_HOST=.*/DB_HOST=db-testing/" .env.testing
$ ./vendor/bin/phpunit
```

### Send Test Mail

```
$ docker-compose exec app ash -l
$ sed -i -e "s/MAIL_HOST=.*/MAIL_HOST=mail/" .env
$ sed -i -e "s/MAIL_PORT=.*/MAIL_PORT=1025/" .env

$ php artisan tinker
Mail::raw('test mail',function($message){$message->to('test@example.com')->subject('test');});
```

http://127.0.0.1:3504

## As necessary

### Composer dump autoload

```
$ docker-compose run composer dump-autoload
```

### MySQL connection

```
$ docker-compose exec db bash
$ mysql -u${MYSQL_USER} -p${MYSQL_PASSWORD} ${MYSQL_DATABASE}
```

### Node(npm)

```
$ docker-compose run node npm install
$ docker-compose run node npm run dev
```

### Node(yarn)

```
$ docker-compose run node yarn install
$ docker-compose run node yarn run dev
```

### Redis for Laravel

```
$ docker-compose exec app ash -l
$ composer require predis/predis
$ sed -i -e 's/REDIS_HOST=.*/REDIS_HOST=redis/' .env
$ sed -i -e 's/CACHE_DRIVER=.*/CACHE_DRIVER=redis/' .env
$ sed -i -e 's/SESSION_DRIVER=.*/SESSION_DRIVER=redis/' .env

$ php artisan tinker
Redis::set('name', 'hoge');
Redis::get('name');
```

### Redis cli

```
$ docker-compose exec redis ash -l
$ redis-cli
```

### Clear database volume

```
$ docker volume ls
local               ${COMPOSE_PROJECT_NAME}_db-data

$ docker volume rm ${COMPOSE_PROJECT_NAME}_db-data
```

## ToDo for myself

