# News Web Application

News Web Application is a simple PHP-based web application built using the Model-View-Controller (MVC) architecture. It allows users to read news articles, manage categories, and perform user authentication.

## Features

- MVC architecture for organizing code into models, views, and controllers.
- Database integration using PDO Wrapper for MySQL database.
- User authentication and session management.
- News articles management: read, create, update, and delete articles.
- Category management: manage news categories.
- Simple and intuitive user interface.

## Directory Structure

The directory structure of the News Web Application is as follows:

- **app**: Contains the core application files.
  - **config**: Configuration files, including database configurations.
  - **controllers**: Controllers for handling requests and business logic.
  - **core**: Core framework classes and utilities.
  - **models**: Model classes for interacting with the database.
  - **views**: View files for rendering HTML content.
- **public**: Publicly accessible files, including front-end assets and entry point (`index.php`).

## Usage

1. Define routes in the `public/index.php` file to map URLs to controller methods.
2. Create controller classes in the `app/controllers` directory to handle different parts of your application.
3. Define model classes in the `app/models` directory to interact with the database.
4. Create view files in the `app/views` directory to render HTML content.
5. Use session management and user authentication utilities provided by the `Session` class.
6. Customize the application by extending core classes and adding additional functionality as needed.
