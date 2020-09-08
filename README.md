# License

The SGA-Project open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

# Installation

## Intalation Composer

Laravel uses Composer to manage its dependencies. So, before using Laravel, make sure you have Composer installed on your pc. Through the following link, you can install Composer in your pc, [Intallar Composer](https://getcomposer.org/download/).

## Laravel Installation

First, download the Laravel installer using Composer, by typing the following command in your console

```
composer global require laravel/installer
```
 
You can see the official Laravel documentation in the following link, [See Docs](https://laravel.com/docs/7.x/installation).

 
## Git Installation

You can install Git through the following link, [Install Git](https://git-scm.com/downloads).

## Clone Project

First you must clone the project , [See project in GitHub](https://github.com/juliodaal/SGA-Project), to clone it you must execute in console the following command:

```
$ git clone https://github.com/juliodaal/SGA-Project.git
```

After cloning the project you must execute the following command in your terminal:

```
composer install
```
This is to be able to install all those dependencies coming from composer.

Next, execute the following command:

```
npm install
```
To install the dependencies coming from npm required by the project.

## .env Fiel

Then we will see that we do not have the file .env in our project, this file is responsible for the configuration of environment variables.  But, we will see the .env.exmple file.

We must duplicate this file and rename it to .env and place it next to our file .env.example we can modify the environment variables from there.

We must create our own APP_KEY, and you can use the following command to do it:

```
php artisan key:generate
```
For more information visit the official documentation of Laravel, .[env laravel](https://laravel.com/docs/7.x/configuration#environment-configuration "env laravel").

## Running Project

It is necessary to establish a connection to our database using the environment variables 

Example:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sga_database
DB_USERNAME=root
DB_PASSWORD=
```
For more information about the connection to the database, see the following link, [See Docs](https://laravel.com/docs/7.x/database).

> Note: remember that you must create your database with the same name specified in DB_DATABASE

Then, run all the migrations to our database, you can do it with the following command:


```
php artisan migrate
```

To run the project, you must through your console, access to the folder of the project, once inside the project you must execute the command:

```
php artisan serve
```

# Data Base

Entity-Relationship Model (ERM)
You can get the Entity-Relationship Model through the following link, [See ER Model](https://github.com/juliodaal/SGA-Project/blob/master/public/DB%20Structure/DB%20Structure.png).

## Migrations

You will find the migrations in Database\migrations
To create new migrations you can execute the following command:

```
php artisan make:migration << name_migration >>
```
For more information about how to manage migrations, you can access the official documentation at Laravel, [See Docs](https://laravel.com/docs/7.x/migrations#introduction).

## Models

All models are directly in the App folder, with the singular name of each table in the database.
To create new models you can execute the following command:

```
php artisan make:model << name_model >>
```
For information about how to manage the Models, you can access the official documentation in Laravel, [See Docs](https://laravel.com/docs/7.x/eloquent#defining-models).

# Structure

## Controllers

All the controllers are in the App\Http\Controllers
To create new Controllers you can execute the following command:

```
php artisan make:controller << name_controller >>
```

For information about how to manage the Controllers, you can access the official documentation at Laravel, [See Docs](https://laravel.com/docs/7.x/controllers#introduction).

## Middlewares

All Middlewares are in App\Http\Middleware
To create new Middlewares you can execute the following command:

```
php artisan make:middleware << name_middleware >>
```
For information about how to manage the Middlewares, you can access the official documentation at Laravel, [See Docs](https://laravel.com/docs/7.x/middleware#introduction).

## Routes
All Routes are in Routes\web.php
The Routes have the following structure:

```
Route::methodName('url', 'execution');
For example:
Route::get('/home', 'HomeController@index');
```
For information about how to manage the Routes, you can access the official documentation in Laravel, [See Docs](https://laravel.com/docs/7.x/routing#route-parameters).

## Views

All Views are in Resources\views
To create a new view, you must create a new file inside the views folder with the extension .blade.php
For example:

```
myView.blade.php
```
For information about how to manage the Views, you can access the official documentation in Laravel, [See Docs](https://laravel.com/docs/7.x/views#creating-views).

## Public

In the Public folder, you can find the Images, the CSS styles, the .xlsx files and different files that you can access.
To access the Public folder through the code you can use the following line:

```
Example: {{asset("image/image.png")}}
```

## Laravel Collective

In this project, Laravel collective has been frequently used for the creation of Forms.
For more information about Laravel collective, you can access the official documentation in [See Docs](https://laravelcollective.com/).

# Use

## Top Admin

To access the application, first you must create a user called Top Admin (you can change the name if you want), this user is not created from a common record, you must create it through your console, running the following command:

```
php artisan tinker
```
Then you enter the following command:

```
App\User::create([ 'name'=>'Top Admin', 'email'=>'topAdmin@gmail.com', 'password'=>Illuminate\Support\Facades\Hash::make(123), 'type_user_from_type_users'=>4, 'card_id'=>'421421421b' ]);
```
> Note: you can change all values except the type_user_from_type_users as this is a value that is used in other areas within the application.

## Create
To create an Administrator, Student, teacher, careers, disciplines, education plan and programs you must first create a Top Admin type User, then once inside the application in the /home, you will have different forms to create all of them.


> Note: you must have configured Mailgun for the Users to receive their password to their email. You can see the Mailgun section for more information.


## Update or Remove

To update the data of a User, Career, Discipline, etc. As an Administrator or Top Admin, in /home you must go to the sections "see", either "See Students" or "See Disciplines", etc. Once there you must fill in the fields to search, just one field is enough (to show all the Students, Teachers and Administrators. In the section of the Name you can put "*" and click on Search)

Then, click on edit, change the data and click on send.
To delete, click on Delete and you're done.

## Subscribe  to disciplines
In order for a student to enroll in a specific discipline, the student must enter the application with his/her credentials, go to the Registration section and click on Subscribe in a specific discipline.

## Mailgun

For information about how to configure the sending of emails through Laravel, you can access the official documentation in Laravel, [See Docs](https://laravel.com/docs/7.x/mail#driver-prerequisites).
For information on how to configure Mailgun, you can access the official documentation in Mailgun, [See Docs](https://documentation.mailgun.com/en/latest/quickstart-sending.html#how-to-start-sending-email).
