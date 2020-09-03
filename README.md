<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Installation

# Intalation Composer

Laravel uses Composer to manage its dependencies. So, before using Laravel, make sure you have Composer installed on your pc. Through the following link, you can install Composer in your pc, [Intallar Composer](https://getcomposer.org/download/).

# Laravel Installation

First, download the Laravel installer using Composer, by typing the following command in your console

```
composer global require laravel/installer

```
 
You can see the official Laravel documentation in the following link, [See Docs](https://laravel.com/docs/7.x/installation).

 
# Git Installation

You can install Git through the following link, [Install Git](https://git-scm.com/downloads).

# Clone Project

First you must clone the project , [See project in GitHub](https://github.com/juliodaal/SGA-Project), to clone it you must execute in console the following command:
 
```
$ git clone https://github.com/juliodaal/SGA-Project.git

```

# Running Project

To run the project, you must through your console, access to the folder of the project, once inside the project you must execute the command:

```
php artisan serve

```

## Data Base

Entity-Relationship Model (ERM)
You can get the Entity-Relationship Model through the following link, [See ER Model](https://github.com/juliodaal/SGA-Project/blob/master/public/DB%20Structure/DB%20Structure.png).

# Database Connection

The connection to the database is established in the main section of the project, in the .env file
The project is connected to a MySql database, localhost 127.0.0.1, port 3306, username root, and the database name is sga_database.
For more information about how to manage the .env file, you can access the official documentation at Laravel, [See Docs](https://laravel.com/docs/7.x/database).

# Migrations

You will find the migrations in Database\migrations
To create new migrations you can execute the following command:

```
php artisan make:migration << name_migration >>

```
For more information on how to manage migrations, you can access the official documentation at Laravel, [See Docs](https://laravel.com/docs/7.x/migrations#introduction).

# Models

All models are directly in the App folder, with the singular name of each table in the database.
To create new models you can execute the following command:

```
php artisan make:model << name_model >>

```
For information on how to manage the Models, you can access the official documentation in Laravel, [See Docs](https://laravel.com/docs/7.x/eloquent#defining-models).

## Structure

# Controllers

All the controllers are in the App\Http\Controllers
To create new Controllers you can execute the following command:

```
php artisan make:controller << name_controller >>

```

For information on how to manage the Controllers, you can access the official documentation at Laravel, [See Docs](https://laravel.com/docs/7.x/controllers#introduction).

