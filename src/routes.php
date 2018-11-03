<?php 
// $app->get('/{name}', function ($request, $response, $args) {
//     $sql = "SELECT * FROM users";
//     $stmt = $this->db->query($sql);
//     $results = [];
//         while($row = $stmt->fetch()) {
//             $results[] = $row;
//         }
//     // $response->getBody()->write(var_export($results, true));
//     // return $response;
//     return $this->view->render($response, 'profile.html', [
//         'users' =>  $results
//     ]);
// })->setName('profile');

//home page
$app->get('/', function ($request, $response) {
    return $this->view->render($response, 'home.html');
});

//login page
$app->get('/login', function ($request, $response) {
    return $this->view->render($response, 'login.html');
});

//about page
$app->get('/about', function ($request, $response) {
    return $this->view->render($response, 'about.html');
});

//professor dashboard
$app->get('/professor-dashboard', function ($request, $response) {
    return $this->view->render($response, 'professor-dashboard.html');
});

//student dashboard
$app->get('/student-dashboard', function ($request, $response) {
    return $this->view->render($response, 'student-dashboard.html');
});

//specific quiz page
$app->get('/quiz/{id}', function ($request, $response, array $args) {
    $id = $args['id'];
    return $this->view->render($response, 'quiz.html', [
            'id' => $id
    ]);
});
?>