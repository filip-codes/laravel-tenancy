# Laravel Tenancy

This package allows you to run multiple websites using the same Laravel application while keeping tenant specific data separated for fully independent multi-domain setups.

## Installation

Clone down the repository:
    
```bash
git clone https://github.com/filip-codes/laravel-tenancy.git laravel-tenancy
```

Install the dependencies:

```bash
cd laravel-tenancy
composer install
composer update
npm install
```

Copy the `.env.example` file to `.env`:

```bash
cp .env.example .env
```

Generate the application key:

```bash
php artisan key:generate
```

Set up your `.env` file with your database credentials and run `php artisan migrate` to create all central tables.

Change your `central_domain` in the `config/tenancy.php` file.
