FROM ubuntu:latest
RUN apt-get update && \
    apt-get install -y git apache2 php nodejs npm composer mysql-server && \
    cd /var/www && \
    git clone https://github.com/zhouweitong3/laravel-msgboard.git && \
    cd laravel-msgboard && \
    npm install --save && \
    composer update
EXPOSE 80
EXPOSE 3306