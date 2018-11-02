# CiteRite

## Installation
1. run `git clone https://github.com/Dilloncarley/CiteRite`
2. cd into `CiteRite` and run `mkdir config`
3. create a file named `config.php` with contents of:
```
<?php
$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;

$config['db']['host']   = ''; // where your database is hosted at
$config['db']['user']   = ''; // authorized database user
$config['db']['pass']   = ''; // authorized database user password
$config['db']['dbname'] = ''; // database name you want to connect to
?>
```
4. Ensure you have Composer Dependency manager and run `composer install` 
