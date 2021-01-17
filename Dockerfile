#Установка ОС в виртуальную среду
FROM debian:buster

#Обновление программных пакетов в debian
RUN apt-get update
RUN apt-get -y upgrade

#Установка веб-сервера, системы упр-ия б.д., vim, php и wget для скачивания архивов по сети
RUN apt-get -y install  wget \
                        vim \
                        nginx \
                        mariadb-server \
                        php7.3 php-mysql php-fpm php-pdo php-gd php-cli php-mbstring

#Определяем рабочий каталог контейнера Docker
WORKDIR /var/www/

#Установка PhpMyAdmin
RUN wget https://files.phpmyadmin.net/phpMyAdmin/5.0.4/phpMyAdmin-5.0.4-all-languages.tar.gz && \
    tar -xf phpMyAdmin-5.0.4-all-languages.tar.gz && rm -rf phpMyAdmin-5.0.4-all-languages.tar.gz && \
    mv phpMyAdmin-5.0.4-all-languages phpmyadmin
COPY ./srcs/config.inc.php phpmyadmin

#Установка Wordpress
RUN wget https://ru.wordpress.org/latest-ru_RU.tar.gz && \
    tar -xvzf latest-ru_RU.tar.gz && rm -rf latest-ru_RU.tar.gz
COPY ./srcs/wp-config.php wordpress

#Определяем рабочий каталог SSL
WORKDIR /etc/nginx/ssl/

#Настройка сертификата SSL
RUN	openssl req -newkey rsa:4096 \
    -x509 \
    -sha256 \
    -days 365 \
    -nodes \
    -keyout my_key.key \
    -out my_certificate.crt \
    -subj "/C=RU/ST=Tatarstan/L=Kazan/O=21school/OU=Evolution/CN=localhost"

COPY srcs/nginx.config /etc/nginx/sites-available/
COPY srcs/create_db.sql /etc/nginx/sql/
COPY srcs/run.sh /

RUN ln -s /etc/nginx/sites-available/nginx.config /etc/nginx/sites-enabled/

WORKDIR /

CMD bash run.sh