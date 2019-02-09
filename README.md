# Laravel Api Authentication wizard!
How to do a RESTful API in Laravel 5.5 with authentication by email and password using Laravel Passport (OAuth 2.0)

### Prerequisites
* Apache
* PHP
* Composer
* Envirenment for deploy project

### Step 1 - Clone this Repo

### Step 2 - Run composer install
```
composer install
```

### Step 3 - Create database and makes changes into following file
```
.env
```

### Step 4 - Run migrations
```
php artisan migrate
```

### Step 5 - Install Laravel Passport
```
php artisan passport:install
```

### Step 6 - Test API endpoints using CURL or Using REST Client tool or extension(like Postman, Mozilla Rest Client, etc.)
Register

```
http://localhost/api-auth-wizard/api/register?name=your_name&email=your_email_address&password=your_password
```

```
curl -X POST -H 'Accept: application/json' -d 'name=your_name&email=your_email_address&password=your_password&password_confirmation=your_password' http://localhost/api-auth-wizard/api/register

```

Login

```
http://localhost/api-auth-wizard/api/login?email=your_email_address&password=your_password
```

```
curl -X POST -H 'Accept: application/json' -d 'email=your_email_address&password=your_password' http://localhost/api-auth-wizard/api/login
```

Verify Email

```
http://localhost/api-auth-wizard/api/user/verify/{email_token}
```

```
curl -X POST -H 'Accept: application/json' -d 'token={email_token}' http://localhost/api-auth-wizard/api/user/verify
```

Logout


```
http://localhost/api-auth-wizard/api/logout?token={after_login_token}
```

```
curl -H 'Accept: application/json' -H 'Authorization: Bearer token_generated_on_register_or_login' http://localhost/api-auth-wizard/api/logout
```