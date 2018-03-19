# Inventory Management Application
* clone the repository.
* run `composer install` from the project directory.
* run `cp .env .env.example` to create the environment variable. Please make sure the Database name provided does exist.
* run `php artisan key:generate` to generate the application key.
* run `php artisan migrate --seed` from the project root to add some data to the database
* run `php artisan serve` and the application will be served to `http://localhost:8000`

#Features Include

* Role Management
* Permission Role Management
* Permission Management
* Role User Management
* Procurement Management
* Order Management
* Order Processing
* Reports
    * Order Reports in PDF
    * Order Report in Excel
    * Current Stock Balance Report. 
