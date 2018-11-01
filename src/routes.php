<?php 
require '../vendor/noodlehaus/dispatch/src/dispatch.php';
$config = require __DIR__.'/config.php';
$db = createDBConnection($config['db']);
?>