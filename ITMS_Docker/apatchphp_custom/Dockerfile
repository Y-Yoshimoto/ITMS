FROM php:7.2-apache
MAINTAINER y.yoshimoto
# https://hub.docker.com/_/php

## ライブラリ追加
RUN docker-php-ext-install pdo_mysql
RUN pecl install redis-5.0.2\
    && pecl install mongodb-1.6.0 \
    && docker-php-ext-enable redis mongodb

## 設定ファイル設置
COPY php.ini /usr/local/etc/php/
COPY inquiry.inc /var/www/inc/

## コンテツファイルの設置
# COPY contents/* /var/www/html/
