# E-Commerce Laravel Project

This is a **E-commerce platform** built using the **Laravel framework**. It provides basic functionality for product listing, shopping cart, and order management.

## Features

- **Product Management**: Add, update, delete, and manage products with images, descriptions, and categories.
- **Product Search and Filtering**: Advanced product search with filtering by category.
- **Review System**: Users can leave star ratings and reviews for products, with a limit of one review per user per product.
- **Multi-user system**:
  - **Admin users** with access to the dashboard for managing products, categories, and orders.
  - **Regular users** with access to the website for browsing products, adding items to the cart, and placing orders.
- Product catalog with category filters.
- Soft delete functionality for products and catalog.
- Shopping cart system (add, remove, update items).
- Order checkout process.
- User authentication (registration, login).
- Admin dashboard for managing products, categories, and users.
- Responsive front-end design.
  
## Live Video Demo
You can watch a live demonstration of the project here: [Watch Live Demo](https://drive.google.com/file/d/1GHGn4kOWJ-8Ie08UIms1nSDcKWYJXMap/view?usp=sharing)

## Requirements

To run this project, you need to have the following installed:

- PHP >= 7.1
- Composer
- MySQL or another supported database
- Node.js & npm (for front-end assets)
- Laravel 5.8

## Installation Instructions

Follow these steps to install and run the project locally.

### Step 1: Clone the Repository
First, clone the repository from GitHub:
```bash
git clone https://github.com/HudaSeyam/E-Commerce-Laravel-.git
cd e-commerce-laravel
```

### Step 2: Set Up the Environment
Copy the example environment file and update the environment variables:
```bash
cp .env.example .env
```
Set up the following variables in the .env file:
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```
Generate the Laravel application key:
```bash
php artisan key:generate
```

### Step 3: Run Migrations
Run the database migrations to create the necessary tables:
```bash
php artisan migrate
```

### Step 4: Seed the Database
```bash
php artisan db:seed
```
### Step 5: Start the Development Server

Now, you can start the Laravel development server:
```bash
php artisan serve
```
Visit http://localhost:8000 in your browser to see the application.
