# Workopia

Workopia is a job listing website created by Brad Traversy. It includes a custom Laravel-like router, controller classes, views, a database layer and a project structure using namespaces and PSR-4 autoloading. It highlights how to structure a PHP project without using any frameworks or libraries.

![Workopia](/src/public/images/screen.jpg)

## Usage

### Requirements

- Docker
- Docker Compose

### Installation

1. Clone the repository:
    ```sh
    git clone https://github.com/mbsurfer/workopia-php-dockerized
    cd workopia-php-dockerized
    ```
2. Copy the example environment variables file and modify it (optional):
    ```sh
    cp .env.example .env
    ```
   
3. Build and start the server container and its dependencies from the root directory:
    ```sh
    docker-compose up -d --build server
    ```
   
4. Install dependencies
    ```sh
    docker-compose run --rm composer install
   ```
   
5. Set up the database
   - Connect to the MySQL docker container using the information below.
      - The connection settings are defined in the .env file
      - Defaults
        - hostname: `127.0.0.1`
        - port: `3307`
        - username: `workopia_user`
        - password: `yoursecretpassword`
   - Create the database by running the SQL commands in the `workopia.sql` file.

## Project Structure and Notes

#### Custom Laravel-like router

Creating a route in `routes.php` looks like this:

`$router->get('/lisings', 'ListingController@index');`

This would load the `index` method in the `App/controllers/ListingController.php` file.

#### Authorization Middleware

You can pass in middleware for authorization. This is an array of roles. If you want the route to be accessible only to logged-in users, you would add the `auth` role:

`$router->get('/listings/create', 'ListingController@create', ['auth']);`

If you only want non-logged-in users to access the route, you would add the `guest` role:

`$router->get('/register', 'AuthController@register', ['guest']);`

#### Public Directory

This project has a public directory that contains all of the assets like CSS, JS and images. This is where the `index.php` file is located, which is the entry point for the application.

You will need to set your document root to the `public` directory.

#### Framework Directory

All of the core files for this project are in the `Framework` directory. This includes the following files:

- **Database.php** - Database connection and query method (PDO)
- **Router.php** - Router logic
- **Session.php** - Session logic
- **Validation.php** - Simple validations for strings, email and matching passwords
- **Authorization.php** - Handles resource authorization
- **middleware/Authorize.php** - Handles authorization middleware for routes

#### PSR-4 Autoloading

This project uses PSR-4 autoloading. All of the classes are loaded in the `composer.json` file:

```json
 "autoload": {
    "psr-4": {
      "Framework\\": "Framework/",
      "App\\": "App/"
    }
  }
```

#### Namespaces

This project uses namespaces for all of the classes. Here are the namespaces used:

- **Framework** - All of the core framework classes
- **Framework\Router** - All of the router classes
- **Framework\Session** - All of the session classes
- **Framework\Validation** - All of the validation classes
- **Framework\Authorization** - All of the authorization classes
- **Framework\Middleware\Authorize** - Authorization middleware
- **App\Controllers** - All of the controllers

#### App Directory

The `App` directory contains all of the main application files like controllers, views, etc. Here is the directory structure:

- **controllers/** - Contains all of the controllers, including listings, users, home and error
- **views/** - Contains all of the views
- **views/partials/** - Contains all of the partial views

#### Other Files

- **/index.php** - Entry point for the application
- **public/.htaccess** - Handles the URL rewriting
- **/helpers.php** - Contains helper functions
- **/routes.php** - Contains all of the routes
- **/config/db.php** - Contains the database configuration
- **composer.json** - Contains the composer dependencies
- **workopia.sql** - Contains the database dump

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
