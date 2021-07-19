Proyecto base para configurar Codeigniter 4 con Bootstrap5, validaciones varias de formularios, login, encriptación y contraseñas(crear y comenzar session), PHPMailer 6.5 en un servidor Godaddy, te servirá de base para comenzar tus proyectos si eres principiante. Puedes modificarlo o servirte de guía para comenzar tus proyectos.

Una vez descomprimido el archivo .zip que descargaste, debes crear la base de datos **“base-proyecto-cod”** en tu servidor e importar la tabla de usuarios que está en el archivo **zzzbaseDatos-proyecto-cod.sql**, el nombre de la base de datos la puedes cambiar a tu gusto pero cambiando el nombre nuevo en el archivo:

**app\Config\Database.php**

public $default = [

		'DSN'      => '',
		'hostname' => 'localhost',
		'username' => 'root',
		'password' => '',
		'database' => 'base-proyecto-cod',
		'DBDriver' => 'MySQLi',
		

Los archivos originales de la carpeta public estan copiados en el directorio raíz del proyecto.

En el caso que cambies el nombre de tu carpeta de trabajo, modificar el archivo **app\Config\App.php** con el con el path de tu url

	public $baseURL = 'http://localhost/codeigniter/base-proyecto-cod/';

**bootstrap5** esta copiado en el directorio public **css y js** que se descargo de  https://getbootstrap.com/

Se elimino index.php en:

	app\Config\App.php
	public $indexPage = 'index.php';
	public $indexPage = '';
	Esto se hace para eliminar el index que se ve en la url es opcional

## Instalar Phpmailer 6.5 en codeigniter4 funciona también en hosting Godaddy

Las carpetas que se descargaron de https://github.com/PHPMailer/PHPMailer se deben colocar en la carpeta de proyecto 

**app\ThirdParty\PHPMailer**

# CodeIgniter 4 Application Starter

## What is CodeIgniter?

CodeIgniter is a PHP full-stack web framework that is light, fast, flexible and secure.
More information can be found at the [official site](http://codeigniter.com).

This repository holds a composer-installable app starter.
It has been built from the
[development repository](https://github.com/codeigniter4/CodeIgniter4).

More information about the plans for version 4 can be found in [the announcement](http://forum.codeigniter.com/thread-62615.html) on the forums.

The user guide corresponding to this version of the framework can be found
[here](https://codeigniter4.github.io/userguide/).

## Installation & updates

`composer create-project codeigniter4/appstarter` then `composer update` whenever
there is a new release of the framework.

When updating, check the release notes to see if there are any changes you might need to apply
to your `app` folder. The affected files can be copied or merged from
`vendor/codeigniter4/framework/app`.

## Setup

Copy `env` to `.env` and tailor for your app, specifically the baseURL
and any database settings.

## Important Change with index.php

`index.php` is no longer in the root of the project! It has been moved inside the *public* folder,
for better security and separation of components.

This means that you should configure your web server to "point" to your project's *public* folder, and
not to the project root. A better practice would be to configure a virtual host to point there. A poor practice would be to point your web server to the project root and expect to enter *public/...*, as the rest of your logic and the
framework are exposed.

**Please** read the user guide for a better explanation of how CI4 works!

## Repository Management

We use Github issues, in our main repository, to track **BUGS** and to track approved **DEVELOPMENT** work packages.
We use our [forum](http://forum.codeigniter.com) to provide SUPPORT and to discuss
FEATURE REQUESTS.

This repository is a "distribution" one, built by our release preparation script.
Problems with it can be raised on our forum, or as issues in the main repository.

## Server Requirements

PHP version 7.3 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php)
- xml (enabled by default - don't turn it off)
