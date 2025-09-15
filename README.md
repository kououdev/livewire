## About This App

This is a Laravel + Livewire CRUD application with the following features:

-   **Dashboard**: Main page with navigation to all modules.
-   **Books**: Manage book data (CRUD).
-   **Customers**: Manage customer data (CRUD).
-   **Borrowings**: Manage book borrowings, linked to books and customers. Borrowings has separate pages for index, create, edit, and view.

### Routes

-   `/` — Dashboard (menu to all modules)
-   `/books` — Book CRUD
-   `/customers` — Customer CRUD
-   `/borrowings` — Borrowings index
-   `/borrowings/create` — Create new borrowing
-   `/borrowings/{borrowing}/edit` — Edit borrowing
-   `/borrowings/{borrowing}` — View borrowing detail

## How to Run This App

1. **Clone this repository**
2. **Install PHP dependencies**
    ```bash
    composer install
    ```
3. **Install Node.js dependencies & build assets**
    ```bash
    npm install && npm run build
    ```
4. **Copy .env example & generate app key**
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```
5. **Set up your database**
    - Edit `.env` and set DB_CONNECTION, DB_DATABASE, DB_USERNAME, DB_PASSWORD as needed.
6. **Run migrations**
    ```bash
    php artisan migrate
    ```
7. **Serve the app**
    ```bash
    php artisan serve
    ```
8. **Access in browser**
    - Open [http://127.0.0.1:8000](http://127.0.0.1:8000)

## Features

-   Laravel 11 + Livewire 3
-   CRUD for Books, Customers, Borrowings
-   Borrowings linked to Books and Customers
-   Borrowings: index, create, edit, view are separate pages for maintainability

---

## Create Supplier with Pagination for Sample
```shell
$ php artisan make:model Supplier -m
$ php artisan migrate

$ php artisan make:livewire Suppliers/Index 
$ php artisan make:livewire Suppliers/Create 
$ php artisan make:livewire Suppliers/Edit 
$ php artisan make:livewire Suppliers/View

```