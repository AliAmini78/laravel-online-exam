



# Getting started

## Installation

Please check the official laravel installation guide for server requirements before you start.

Clone the repository

    git clone https://github.com/AliAmini78/laravel-online-exam.git

Switch to the repo folder

    cd laravel-online-exam

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Run the database seeder and you're done

    php artisan db:seed

Run the laravel development server

    php artisan serve

You can now access the server at http://localhost:8000

