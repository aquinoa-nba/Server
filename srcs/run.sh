service mysql start
mariadb < /etc/nginx/sql/create_db.sql
service php7.3-fpm start
service nginx start
bash
