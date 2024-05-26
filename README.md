## Passport Installation Process

1. Install Laravel: `composer create-project laravel/laravel:^10.0 project-name`
2. Install Passport: `composer require laravel/passport`
3. Run migrations: `php artisan migrate`
4. Install Passport: `php artisan passport:install`
5. Add `Laravel\Passport\HasApiTokens` trait to your `User` model
6. Add `'api'` guard to your `config/auth.php` file
7. Add `$token = $user->createToken('Token Name')->accessToken` to your login method
8. To define public and private routes, use the `auth:api` middleware

