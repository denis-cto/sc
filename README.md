
### 1. Install composer

```
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" &&
php -r "if (hash_file('sha384', 'composer-setup.php') === 'e0012edf3e80b6978849f5eff0d4b4e4c79ff1609dd1e613307e16318854d24ae64f26d17af3ef0bf7cfb710ca74755a') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" &&
php composer-setup.php &&
php -r "unlink('composer-setup.php');"
```

### 2. Install dependencies

```
docker run  --rm --name devilbox-php-fpm-7-4   -v $(pwd):/var/www/html devilbox/php-fpm-7.4 bash -c "apt-get update && apt-get -y install git zip &&  php /var/www/html/composer.phar update" 
```

### 3. Run script

```
docker run  --rm --name devilbox-php-fpm-7-4   -v $(pwd):/var/www/default/htdocs devilbox/php-fpm-7.4 php /var/www/default/htdocs/index.php
```

```
Results: 
Alice   Base salary: 6000       Tax: 20 Net pay: 4800
Bob     Base salary: 4000       Tax: 20 Net pay: 3024
Charlie Base salary: 5000       Tax: 18 Net pay: 3690
```

### 4.Run tests
```
docker run  --rm --name devilbox-php-fpm-7-4   -v $(pwd):/var/www/html devilbox/php-fpm-7.4 bash -c "./vendor/bin/phpunit tests"
```
```
PHPUnit 7.5.20 by Sebastian Bergmann and contributors.

........                                                            8 / 8 (100%)

Time: 503 ms, Memory: 4.00 MB

OK (8 tests, 21 assertions)
```

### Changes
If you want to modify script, just change data in index.php
```php
$data = [
    [
        'name' => 'Alice',
        'age' => 26,
        'childrenCount' => 2,
        'baseSalary' => 6000,
        'leasedProperties' => [],
    ]...`
 ```   
If you want to exclude some allowances, remove them on application initialization step

```php
AllowanceRegistry::register('ageAllowance', new AgeAllowance());
AllowanceRegistry::register('childAllowance', new ChildAllowance());
AllowanceRegistry::register('leasedPropertiesAllowance', new LeasedPropertiesAllowance());
````

If you want to change rules and conditions of salary calculations, make changes to
appropriate Allowance class, for example
```php
<?php

namespace SalaryCalculator;

/**
 * Class ChildAllowance
 */
class ChildAllowance implements Allowance
{
    /**
     * @param Employee $employee
     * @return SalaryCalculation
     */
    public function getCalculation(Employee $employee): SalaryCalculation
    {
        if ($employee->getChildrenCount() > 2) {
            return new SalaryCalculation(0, -2);
        }
        return new SalaryCalculation(0, 0);
    }
}
```
