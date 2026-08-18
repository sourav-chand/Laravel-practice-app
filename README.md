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
- PHP 8.3+
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
