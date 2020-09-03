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
For more information about how to manage migrations, you can access the official documentation at Laravel, [See Docs](https://laravel.com/docs/7.x/migrations#introduction).

# Models

All models are directly in the App folder, with the singular name of each table in the database.
To create new models you can execute the following command:

```
php artisan make:model << name_model >>
```
For information about how to manage the Models, you can access the official documentation in Laravel, [See Docs](https://laravel.com/docs/7.x/eloquent#defining-models).

## Structure

# Controllers

All the controllers are in the App\Http\Controllers
To create new Controllers you can execute the following command:

```
php artisan make:controller << name_controller >>
```

For information about how to manage the Controllers, you can access the official documentation at Laravel, [See Docs](https://laravel.com/docs/7.x/controllers#introduction).

# Middlewares

All Middlewares are in App\Http\Middleware
To create new Middlewares you can execute the following command:

```
php artisan make:middleware << name_middleware >>
```
For information about how to manage the Middlewares, you can access the official documentation at Laravel, [See Docs](https://laravel.com/docs/7.x/middleware#introduction).

# Routes
All Routes are in Routes\web.php
The Routes have the following structure:

```
Route::methodName('url', 'execution');
For example:
Route::get('/home', 'HomeController@index');
```
For information about how to manage the Routes, you can access the official documentation in Laravel, [See Docs](https://laravel.com/docs/7.x/routing#route-parameters).

# Views

All Views are in Resources\views
To create a new view, you must create a new file inside the views folder with the extension .blade.php
For example:

```
myView.blade.php
```
For information about how to manage the Views, you can access the official documentation in Laravel, [See Docs](https://laravel.com/docs/7.x/views#creating-views).

# Public

In the Public folder, you can find the Images, the CSS styles, the .xlsx files and different files that you can access.
To access the Public folder through the code you can use the following line:

```
Example: {{asset("image/image.png")}}
```

# Laravel Collective

In this project, Laravel collective has been frequently used for the creation of Forms.
For more information about Laravel collective, you can access the official documentation in [See Docs](https://laravelcollective.com/).

## Use

# Top Admin

To access the application, first you must create a user called Top Admin (you can change the name if you want), this user is not created from a common record, you must create it through your console, running the following command:

```
php artisan tinker
```
Then you enter the following command:

```
App\User::create([ 'name'=>'Top Admin', 'email'=>'topAdmin@gmail.com', 'password'=>Illuminate\Support\Facades\Hash::make(123), 'type_user_from_type_users'=>4, 'card_id'=>'421421421b' ]);
Note: you can change all values except the type_user_from_type_users as this is a value that is used in other areas within the application.
```

# Create
To create an Administrator, Student, teacher, careers, disciplines, education plan and programs you must first create a Top Admin type User, then once inside the application in the /home, you will have different forms to create all of them.

```
Note: you must have configured Mailgun for the Users to receive their password to their email.
```

# date or Remove

To update the data of a User, Career, Discipline, etc. As an Administrator or Top Admin, in /home you must go to the sections "see", either "See Students" or "See Disciplines", etc. Once there you must fill in the fields to search, just one field is enough (to show all the Students, Teachers and Administrators. In the section of the Name you can put "*" and click on Search)
Then, click on edit, change the data and click on send.
To delete, click on Delete and you're done.

# bscribe to disciplines
In order for a student to enroll in a specific discipline, the student must enter the application with his/her credentials, go to the Registration section and click on Subscribe in a specific discipline.

# Mailgun

For information about how to configure the sending of emails through Laravel, you can access the official documentation in Laravel, [See Docs](https://laravel.com/docs/7.x/mail#driver-prerequisites).
For information on how to configure Mailgun, you can access the official documentation in Mailgun, [See Docs](https://documentation.mailgun.com/en/latest/quickstart-sending.html#how-to-start-sending-email).
