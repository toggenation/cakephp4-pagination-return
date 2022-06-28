# Docker Compose CakePHP 4 Setup

## Features
* mailhog
* MySQL 
* nginx
* php-fpm

Using a `docker-compose.yaml` file

Clone this repo and rename `~/env.example` to `.env` then run

```
docker-compose up
```

### Video Timings
I put a video of this up on Youtube 

00:00 Intro
00:24 Install Remote - SSH VSCode extension
01:33 Enable SSH Public Key Authentication on remote Linux Host
03:23 Remote Linux Host Setup
04:00 Install PHP & Composer & Docker & Docker Compose on remote Linux Host
09:30 
12:47 Using FileZilla to copy files up to Linux
14:21 docker-compose.yaml overview of services & containers
21:46 Install Docker Extension
22:10 Run docker-compose up & fix permission errors
28:08 docker-compose up -d to build and run containers
32:35 Connecting to container services over the network from Windows 10
33:06 Fix permissions errors after getting containers running
35:04 Fixing problem of running docker after change to group membership to allow normal user to access docker
40:05 Install Remote Containers Extension in VS Code
41:00 Connect to Remote Docker PHP Container
43:30 Connect to Mailhog Dashboard over the network
44:00 Download & Install MySQL Workbench
46:30 Configure MySQL Workbench to connect to Remote MySQL Server Container
49:00 Connect cakephp to MySQL database
52:00 Create a "Posts" table using a migration
53:35 Crate a Mailer class using bin/cake bake
55:13 Install PHP Intelephense 
55:56 Configure EmailTransport to use mailhog
57:10 Send email using Mailer class from controller action
1:01:25 XDebug
1:06:18 Intalling Git version control in a container and upload project to Github
1:12:17 Wrap up



