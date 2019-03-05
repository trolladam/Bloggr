# Bloggr

Steps to do after downloading the source code

## Step 1

Install composer dependencies by the `composer.json` file with running the following command

```
composer install
```

## Step 2

Create an empty database for your application in phpmyadmin

## Step 3

- Duplicate the `.env.example` file and rename it to `.env`

- Then fill out your environment information especially the part about database connection

- Generate a new application key with the following command

```
php artisan key:generate
```

## Step 4

Run the migration and seed scripts with 

```
php artisan migrate --seed
```

## Step 5

Create a virtualhost for your application in your apache `httpd-vhosts.conf` file.

Example vhost config

```
Listen 8081

<VirtualHost *:8081>
    DocumentRoot "%APP_DIR%\public"
    ServerName localhost
    <Directory "%APP_DIR%\public">
        Options Indexes FollowSymLinks Includes ExecCGI
        AllowOverride All
        Allow from all
        Require all granted
    </Directory>
</VirtualHost>
```

- First open an available port with `Listen`
- After opening a port pay attention to use the same port in your first line of VirtualHost declaration that you just opened
- Replace the two `%APP_DIR%` to the path of your Laravel installation

