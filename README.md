Run

### 1. Install composer

`php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" &&
php -r "if (hash_file('sha384', 'composer-setup.php') === 'e0012edf3e80b6978849f5eff0d4b4e4c79ff1609dd1e613307e16318854d24ae64f26d17af3ef0bf7cfb710ca74755a') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" &&
php composer-setup.php &&
php -r "unlink('composer-setup.php');"`

### 2. Install dependencies

` docker run  --rm --name devilbox-php-fpm-7-4   -v $(pwd):/var/www/html devilbox/php-fpm-7.4 bash -c "apt-get update && apt-get -y install git zip &&  php /var/www/html/composer.phar update" 
`
### 3. Run script

` docker run  --rm --name devilbox-php-fpm-7-4   -v $(pwd):/var/www/default/htdocs devilbox/php-fpm-7.4 php /var/www/default/htdocs/index.php
`

### 4.Run tests
`docker run  --rm --name devilbox-php-fpm-7-4   -v $(pwd):/var/www/html devilbox/php-fpm-7.4 bash -c "./vendor/bin/phpunit tests"
`
