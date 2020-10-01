# phpmga.net

Web Site of PHP Community Maringa

## Quick start

1 - Clone the repo:

```bash
git clone https://github.com/phpmga/website.git phpmga.net
```

2 - Change to the directory created

```bash
cd phpmga.net/
```

3 - Download Composer

Run this in your terminal to get the latest Composer version:

```bash
curl -sS https://getcomposer.org/installer | php
```

or if you don't have curl:

```bash
php -r "readfile('https://getcomposer.org/installer');" | php
```

4 - Composer Install

```bash
php composer.phar install
```

or composer path:

```bash
composer install
```

5 - Create file .env 

```bash
cp .env.example .env
```

6 - Set the application key

```bash
php artisan key:generate
```

7 - Start PHP Artisan Built-in web server:

```bash
php artisan serve
```

## Install AngularJS & Semantic UI

1 - Install bower and npm dependencies:

```bash
npm install -g bower
```

```bash
bower install
```

2 - Install gulp and elixir:

```bash
npm install
```

3 - Run gulp to build production:

```bash
gulp --production
```
## Publish website to phpmga.net

1 - Automate SSH connection:
    You need to edit/create the file ~/.ssh/config on your computer. Then add this content.

```bash
  Host phpmga.net
  User freebsd
  PreferredAuthentications publickey
```

2 - Add phpmga.net as a remote. On your computer, navigate to your git repo and run this command.

```bash
git remote add phpmga-publish phpmga.net:/usr/local/www/phpmga.net/
```

3 - Execute the command below to publish website

* First publish
```bash
git push phpmga-publish master
```
* Other publish
```bash
git push phpmga-publish
```

##Copyright and license

Code and documentation copyright (c) 2015, PHP Community Maringa.
