# Glint

Glint - Glimpse of Intel

Get bite-sized intelligence delivered routinely. This project was developed to play with [LeafPHP](https://leafphp.dev/), and is in early active development.

## Install

To work on Glint, simply fork to your userspace. This guide assumes your are cloning glint into the htdocs folder of your web server, or have the requisite knowledge to point a virtual server. Follow the easy steps below to get started:

1. Install depends: ```composer install```
2. Create MySql database through mysqld or phpmyadmin, your choice.
3. Modify the default ```.env```:
    * Special attention to DB variables
    * Obtain a YouTube API key through the [Google Developer Console](https://console.cloud.google.com/apis/dashboard).
4. Initialize the database (seed to get some default content):
    ```
    php leaf db:install
    php leaf db:migrate
    php leaf db:seed
    ```

## Issues

Feel free to create issues or contact myself (**Theagiledev**) via the LeafPHP Discord.