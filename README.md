## ✨ Inventory Management System

Inventory Management System with Laravel 10 and MySql.

## 😎 Features

-   POS
-   Orders
    -   Pending Orders
    -   Complete Orders
    -   Pending Due
-   Purchases
    -   All Purchases
    -   Approval Purchases
    -   Purchase Report
-   Products
-   Customers
-   Suppliers

## 🚀 How to Use

1. Clone Repository `git clone https://github.com/mjc169/inventory-management-system`
2. Go into the repository `cd inventory-management-system`
3. Update Packages via `composer update` or Install Packages `composer install`
4. Copy `.env` file `cp .env.example .env`
5. Generate app key `php artisan key:generate`

6. Run your Xampp/Laragon to run your MYSQL for the database.
7. Create a database named `inventory_management_system` or should be the same in .env "DB_DATABASE="
8. Set up your database credentials in your `.env` file. By default:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=inventory_management_system
DB_USERNAME=root
DB_PASSWORD=
```

9. Run Seed Database: `php artisan migrate:fresh --seed`
10. Create Storage Link `php artisan storage:link`
11. Install `npm i laravel-datatables-vite`
12. Install NPM dependencies `npm install && npm run dev`
13. Run another CMD terminal and run `php artisan serve`
14. Try login with email: `supplier1@dropsynch.com` or `supplier2@dropsynch.com` and password: `password`

## 🚀 Config

1. **Config Chart**

    Open file `./config/cart.php`. You can set a tax, format number, etc.
