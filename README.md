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

5 - Start PHP Artisan Built-in web server:

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

##Copyright and license

Code and documentation copyright (c) 2015, PHP Community Maringa.