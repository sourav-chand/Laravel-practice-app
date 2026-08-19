# Task Manager

A simple task/todo manager built with Laravel 13 for practice. Create, edit, complete, and delete tasks with a clean UI.

## Features

- Create tasks with a title and optional description
- Mark tasks as complete or pending
- Edit and delete tasks
- Form validation
- Clean, responsive UI with Tailwind CSS

## Tech Stack

- Laravel 13
- PHP 8.4+
- SQLite (default)
- Blade templates
- Tailwind CSS

## Setup

```bash
composer install
php artisan key:generate
php artisan migrate
php artisan serve
```

Visit `http://localhost:8000/tasks`

## Docker

Start the application with Docker:

```bash
docker compose up --build -d
```

Visit `http://localhost:8000/tasks`. The SQLite database is stored in
`database/database.sqlite` and remains available on the host. To stop the app:

```bash
docker compose down
```

The Docker image installs production Composer dependencies during its build, so it
can also be deployed without committing the `vendor` directory.
