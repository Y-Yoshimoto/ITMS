FROM php:7.2-apache
LABEL maintainer="y.yoshimoto"
# https://hub.docker.com/_/php

## SSL通信用ライブラリ
RUN apt-get update && apt-get install -y libcurl4-openssl-dev pkg-config libssl-dev\
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# HTTPプロキシサーバを経由する場合
# RUN pear config-set http_proxy http://proxy:3128

## ライブラリ追加
RUN docker-php-ext-install pdo_mysql
RUN pecl install redis-5.0.2\
    && pecl install mongodb-1.6.0 \
    && docker-php-ext-enable redis mongodb \
    && pecl clear-cache

# 実行ユーザー追加(Mac用)
ARG USERNAME=vscode
ARG USER_UID=501
ARG USER_GID=20
RUN useradd -m -s /bin/bash -u $USER_UID -g $USER_GID $USERNAME \
    && usermod -a -G $USER_GID $USERNAME && chmod -R 777 /var/www/html

## 設定ファイル設置
COPY php.ini /usr/local/etc/php/
COPY inquiry.inc /var/www/inc/
RUN chmod 755 /var/www/inc/inquiry.inc \ 
    && chmod 755 /usr/local/etc/php/php.ini


## コンテツファイルの設置
# COPY contents/* /var/www/html/
