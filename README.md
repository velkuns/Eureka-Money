# Eureka Money
Budget Manager for your bank account

## Installation

### Composer
Install the latest version with

```bash
$ composer install eureka/money
```

### Fix "".cache/" perms
You must fix rights on cache directory:
```bash
$ chmod -R 0777 .cache
```

### Apache / Nginx config
Entry of this site / app is: web/index.php
So you must configure your web server to have this directory as home root directory.

### Set-up bdd
#### Money
Create tables file:
./vendor/eureka/package-money/create_tables.sql

Database config:
./vendor/eureka/package-money/config/database.yml

#### User
Create tables file:
./vendor/eureka/package-user/create_tables.sql

Database config:
./vendor/eureka/package-money/config/database.yml

You must create user in database. Actually, it is not possible to create account throught the application.
You can use package password to generate a password and get hash to put in db.

Launch command through console

```bash
$ php eurekon.phar --color --name="Eureka\Package\Password\Generator" --help
```

## Documentation


## About

### Requirements

- Works with PHP 5.6 or above
- Require composer

### Submitting bugs and feature requests

Bugs and feature request are tracked on [GitHub](https://github.com/velkuns/eureka-money/issues)


### Author

Romain Cottard<br />
See also the list of [contributors](https://github.com/velkuns/eureka-money/contributors) which participated in this project.

### License

Eureka\Money is licensed under the MIT License - see the `LICENSE` file for details

