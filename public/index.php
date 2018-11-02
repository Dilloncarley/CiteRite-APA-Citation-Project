<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>CiteRite</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <?php 
    use \Psr\Http\Message\ServerRequestInterface as Request;
    use \Psr\Http\Message\ResponseInterface as Response;
    require 'vendor/autoload.php';
    require 'config/config.php';
    require 'src/dependencies.php';
 
    $app = new \Slim\App(['settings' => $config]);
    $container = $app->getContainer();
    $container['db'] = function ($c) {
        $db = $c['settings']['db'];
        $pdo = new PDO('mysql:host=' . $db['host'] . ';dbname=' . $db['dbname'],
            $db['user'], $db['pass']);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    };
    // Define app routes
    $app->get('/hello/{name}', function ($request, $response, $args) {
        // $records = $this->db->table('test')->where('name', 'like', '%foo%')->get();

        
        
    $response->getBody()->write(var_export($records, true));
    return $response;
        // return $response->write("Hello " . $args['name']);
    });

    // Run app
    $app->run();
?>
    <body>
   <h1>Hi</h1>
    </body>
</html>