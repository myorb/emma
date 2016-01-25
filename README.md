ToDo REST app use Docker, Yii2, AngularJs and redis
===================================================

The task for test work.

Final result should be personal task management tool. Users, log in etc are not important, just focus on the points listed below. Focus more on code than visual. Selected framework you can pick yourself. Either its JQuery, Angular, CanJS, Less, Sass, PHP, MySQL, Yii etc.

Work has to contain following items
Personal task management tool (task name, description, status, time added, time finished etc)
Adding/changing tasks and deleting the old ones 
Mark tasks done

REQUIREMENTS
------------

Composer, docker, docker-compose or web server

* [Docker Engine](https://docs.docker.com/installation/)
* [Docker Compose](https://docs.docker.com/compose/)
* [Docker Machine](https://docs.docker.com/machine/) (Mac and Windows only)



INSTALLATION
------------

### Docker start,

if we using docker, update composer and run docker container 
```bash
git clone https://github.com/myorb/emma.git
cd emma/www/yii2
composer install
cd ../../
docker-composer up -d 
```
### Whithout docker

Config you settings /www/yii2/config/web
Config you web server as sites/default.vhost

You can then access the application through the following URL:

~~~
http://<<<docker ip>>>:86
~~~

### You can change port(86) at docker-compose.yml