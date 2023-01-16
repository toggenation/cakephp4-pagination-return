# CakePHP 4 - Return to the correct paginated page when deleting or editing a Record


See the PostController.php index, edit and delete actions for an example of returning to the correct paginated page after performing an edit or delete

This is example code for Video [https://youtu.be/9m5KkKwTTsI](https://youtu.be/9m5KkKwTTsI)


Also this repo has `phpmyadmin` a docker container. See `docker-compose.yaml`


## Usage

Clone this repo

```sh
cd $repo

cp env.example .env

# edit .env BASE_PORT and passwords to taste

docker compose build

docker compose up -d

# Enter php container

cd /var/www/html

export XDEBUG_MODE=off

composer install

# you may need to edit config/app_local.php to have the correct
# passwords as set in .env

bin/cake migrations migrate

bin/cake migrations migrate -p CakeDC/Users

bin/cake users add_superuser \
    --email admin@example.com \
    --password 1234 \
    --username admin
# output
Superuser added:
Id: ad3892c2-99d0-4d5d-9e7c-d85371cd398d
Username: admin
Email: admin@example.com
Role: superuser
Password: 1234

```

Login and goto [http://localhost:${FORWARD_NGINX_PORT}/Posts](http://localhost:${FORWARD_NGINX_PORT}/Posts)
