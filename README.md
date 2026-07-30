# ToDo App

A simple ToDo list app built with PHP (MVC pattern) and Tailwind CSS.
Tasks are stored in a JSON file, no database is used.

## Features

- View all tasks
- View a single task
- Create a new task
- Edit a task
- Delete a task
- Mark a task as pending, in progress, or complete

## How it works

- **Router**: matches the URL to a controller and action.
- **Controller**: handles the request and talks to the model.
- **Model**: reads and writes tasks to `info.json`.
- **View**: shows the HTML using Tailwind CSS.

## Technology

- PHP 8+
- Tailwind CSS
- HTML

## How to run

1. git clone https://github.com/imjrbarreto/S303-TO-DO.git
2. Start PHP (e.g. `php -S localhost:8000 web/index.php`).
3. Open the app in your browser.
