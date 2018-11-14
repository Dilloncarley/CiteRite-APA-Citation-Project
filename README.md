# CiteRite

## Installation
1. run `git clone https://github.com/Dilloncarley/CiteRite`
2. cd into `CiteRite` and run `mkdir config`
3. create a file named `config.php` with contents of and fill in appropriate values:
```
<?php
$config_array = array(
    'debug' => true,
    'templates.path' => 'templates',
    'dbHost' => '',
    'dbUser' => '',
    'dbPass' => '',
    'dbName' => ''
);
?>
```
4. Ensure you have Composer Dependency manager and run `composer install` 
5. Run `php -S localhost:8888 -t public public/index.php` to serve the site
