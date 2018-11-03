<?php 
    use \Psr\Http\Message\ServerRequestInterface as Request;
    use \Psr\Http\Message\ResponseInterface as Response;
    require 'vendor/autoload.php';
    require 'config/config.php';
    if (PHP_SAPI === 'cli-server' && $_SERVER['SCRIPT_FILENAME'] !== __FILE__) { return false; }

    
    //config app with settings
    $app = new \Slim\App(['settings' => $config]);
    $container = $app->getContainer();
    
    //App dependencies
    require 'src/dependencies.php';

    // App routes
    require 'src/routes.php';
 
    // $app->get('/hello/{name}', function ($request, $response, $args) {
    //     // $records = $this->db->table('test')->where('name', 'like', '%foo%')->get();

        
        
    // $response->getBody()->write(var_export($records, true));
    // return $response;
    //     // return $response->write("Hello " . $args['name']);
    // });

    // Run app
    $app->run();
?>