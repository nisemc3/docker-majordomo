# Welcome to Docker Majordomo!

Это версия рабочая majordomo под docker-compose в 2023 году


#todo English version.


# Stack
major domo:
	- Supervisord - как центральный процесс запуска всех daemon
 	- apache - как web-сервер
 	- php-fpm - как php-сервер
 	- cycle.php через supervisord для стабильности

mysql 5.5
phpmyadmin 5.2.1-apache
брокер mosquitto

## Что появится

В ближайших планах чистка некоторых хвостов  и доработка **init**-скриптов и **make** файла. Так же вывод всего в стабильный образ в **regestry** и разработка **модулей** под docker-связку.

## Поддерживаемые в данный момент OS

Mainstream: Любая Linux os с поддержкой Docker и Docker-compose.
Windows: как дополнительная os, через ubuntu WSL
MacOs и Raspberry в ближайшем будущем будут протестированы.

## Установка под Linux

 1. Склонировать данный репозиторий.
 
`git clone`
 
 2. Обновляемся, устанавливаем docker и docker-compose для себя и перезапускаем сервер:
 
`sudo apt-get update`  
`sudo apt-get upgrade`  
`sudo apt-get install docker docker-compose`  
`sudo usermod -aG docker $USER && reboot`

 3. Для удобства отслеживания докер-контейнеров запускаем контейнер portainer (запустится по адресу http://127.0.0.1:9000):
 
`make run_portainer`
 
 4. Редактирум файл config.env под себя, далее:
 
`make init`

 5. Создаем контейнеры и запускаем их:
 
`make build_up`

 6. Открываем 127.0.0.1/admin.php или localhost или ip где запущен докер. Радуемся.

