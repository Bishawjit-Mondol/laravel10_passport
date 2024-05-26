## Passport Installation Process

1. Install Laravel: `composer create-project laravel/laravel project-name`
2. Install Passport: `composer require laravel/passport`
3. Run migrations: `php artisan migrate`
4. Install Passport: `php artisan passport:install`
5. Add `Laravel\Passport\HasApiTokens` trait to your `User` model 
6. Add `'api'` guard to your `config/auth.php` file
