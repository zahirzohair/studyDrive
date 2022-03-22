# Study Drive Back-end Task

This backend task is about generating a databse from given tables and developing two APIs that enable students to register a course and as well list all the courses with their status either available or not available.

## Users
- Studnet 

# Development 

## How to run locally

This Laravel task can be run on xampp using Apache and mysql by following commands.
    - php artisan serve // to run the on browser 
    - php artisan migrate // to run migration 
    - php artisan db:seed // to run seeding and factory 
    - php artisan migrate:fresh --seed // to run migrations freshly and seed together
    
 For testing with docker we can run follwoing commands to install laravel/sail package and then run in docker environment.
 Before runnig following commands we need to have docker runnig on our machine.
    - composer require laravel/sail --dev
    - php artisan sail:install
    - ./vendor/bin/sail up
