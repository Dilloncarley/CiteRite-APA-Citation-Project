<?php 
$app->get('/{name}', function ($request, $response, $args) {
    $sql = "SELECT * FROM users";
    $stmt = $this->db->query($sql);
    $results = [];
        while($row = $stmt->fetch()) {
            $results[] = $row;
        }
    // $response->getBody()->write(var_export($results, true));
    // return $response;
    return $this->view->render($response, 'profile.html', [
        'users' =>  $results
    ]);
})->setName('profile');
$app->get('/', function ($request, $response) {
    return $this->view->render($response, 'home.html');
});
?>