# Feedback App

# Getting started

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/5.4/installation#installation)
 

Clone the repository

    git clone https://github.com/haseeb-ali-dev/feedback-laravel.git

Switch to the repo folder

    cd feedback-laravel

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000


## Database seeding

Run the database seeder and you're done

    php artisan db:seed

***Note*** : It's recommended to have a clean database before seeding. You can refresh your migrations at any point to clean the database by running the following command

    php artisan migrate:refresh


## API Specification

This application adheres to the api specifications set by the [Thinkster](https://github.com/gothinkster) team. This helps mix and match any backend with any other frontend without conflicts.

> [Postman Collection](https://www.postman.com/haseebali045/workspace/devsinc/collection/17524912-22873454-0ee9-4249-af27-ab5d7668a5b8?action=share&creator=17524912)


----------


## Environment variables

- `.env` - Environment variables can be set in this file

***Note*** : You can quickly set the database information and other variables in this file and have the application fully working.

----------

# Testing API

Run the laravel development server

    php artisan serve

The api can now be accessed at

    http://localhost:8000/api

Request headers

| **Required** 	| **Key**              	| **Value**            	|
|----------	|------------------	|------------------	|
| Yes      	| Content-Type     	| application/json 	| 	|
| Optional 	| Authorization    	| Bearer {JWT}      	|

----------
 
# Authentication
 
This applications uses Sanctum Access Tokens to handle authentication. The token is passed with each request using the `Authorization` header with `Bearer` scheme. The SAT authentication middleware handles the validation and authentication of the token. 


----------
