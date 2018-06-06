## Рабочее окружение
### Требования
+ laradock v7.0.0
+ docker version
    - Client:
        * Version:      17.06.1-ce
        * API version:  1.30
        * Go version:   go1.8.3
        * Git commit:   874a737
        * Built:        Thu Aug 17 22:53:31 2017
        * OS/Arch:      linux/amd64
    - Server:
        * Version:      17.06.1-ce
        * API version:  1.30 (minimum version 1.12)
        * Go version:   go1.8.3
        * Git commit:   874a737
        * Built:        Thu Aug 17 22:51:25 2017
        * OS/Arch:      linux/amd64
        * Experimental: false
+ docker-compose version
    - docker-compose version 1.16.1, build 6d1ac219
    - docker-py version: 2.5.1
    - CPython version: 2.7.9
    - OpenSSL version: OpenSSL 1.0.1t  3 May 2016
+ php: >=7.1.3
+ laravel: 5.6.*

### Установка laradock
```
git submodule init
cd laradock
cp env-example .env
APPLICATION=../
```

### Запуск и остановка контейнеров
```
$ sudo docker-compose up -d nginx mysql
$ sudo docker-compose stop
```

### Подключение к контейнерам
Подключение к bash в контейнере рабочей области под под хост пользователем 
```
$ sudo docker-compose exec --user=laradock workspace bash
```
Подключение в mysql клиенту
```
$ sudo docker-compose exec mysql mysql -u root -proot
```
### Настройка laravel
Выполните следущие действия
```
sudo chmod 777 storage -R
composer update
cp .env.example .env
php artisan key:generate
```
В файле .env укажите настройки хостов соответствующие названиям контейнеров
```
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
```
Настройка базы данных в mysql
```
mysql> CREATE DATABASE `db_name` CHARACTER SET utf8 COLLATE utf8_general_ci;
mysql> CREATE USER 'db_user'@'%' IDENTIFIED BY 'db_secret';
mysql> GRANT ALL PRIVILEGES ON * . * TO 'db_user'@'%';
mysql> FLUSH PRIVILEGES;
mysql> quit
```
Настройка базы данных в laravel
```
DB_DATABASE=db_name
DB_USERNAME=db_user
DB_PASSWORD=db_secret
```