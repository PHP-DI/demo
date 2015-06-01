# PHP-DI application demo

This repository demonstrates how to write a simple application using PHP-DI.

## Screenshot

![](screenshot.png)

## Disclaimer

Watch out, this project is meant to show how to build an application from scratch with PHP-DI in the simplest way possible. You are of course not encouraged to do that (many good frameworks exist already), this is only meant to learn. Be also aware that this code should not go to production.

Improvements and pull requests are welcome.

## Run

To run this demo, you need to clone it and install dependencies:

```
git clone https://github.com/PHP-DI/demo.git
cd demo/
composer install
```

You can then run the web application using PHP's built-in server:

```
php -S 0.0.0.0:8000 -t web/
```

The web application is running at [http://localhost:8000](http://localhost:8000/).

You can also run the CLI application:

```
php console.php
```

The following commands are available:

- `php console.php articles`: lists the blog articles
- `php console.php article [id]`: displays a blog article by its ID

## Architecture

The container is created in [app/bootstrap.php](app/bootstrap.php). The configuration file for the container is [app/config.php](app/config.php).

Both the web application and the CLI application require `app/bootstrap.php` to get the container:

- the web application ([web/index.php](web/index.php)) uses [FastRoute](https://github.com/nikic/FastRoute) for routing, and then creates and invokes the controller using PHP-DI
- the CLI application ([console.php](console.php)) uses [Silly](http://mnapoli.fr/silly/): Silly uses the container to create and invoke the commands

You will note that in both case, the controllers/commands are instantiated and invoked by PHP-DI: this is to benefit from dependency injection in those classes.
