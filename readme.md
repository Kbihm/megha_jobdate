# JobDate Web Platform

https://travis-ci.com/nsg223/jobdate.svg?token=CyQ2sVmqe625Na7jyX72&branch=master

## Installation

Clone the Git repository and run the following.

```bash
composer update
php artisan key:generate
```

Prepare database

```bash
php artisan migrate
php artisan db:seed
```

Run locally for development
```bash
php artisan serve
```

## Routes

Routes are listed on the [wiki](https://github.com/nsg223/jobdate/wiki/JobDate-Routes).

## Test Login Accounts

Test accounts to login are listed on the [wiki](https://github.com/nsg223/jobdate/wiki/Testing-Accounts).
