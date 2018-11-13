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
$app->get('/', function () use ($app, $twig) {
    echo $twig->render('home.html', array('name' => 'Fabien'));

});

//login page
$app->get('/login', function() use ($app, $twig) {
    echo $twig->render('login.html', array('name' => 'Fabien'));
});

//about page
$app->get('/about', function() use ($app, $twig)  {
    echo $twig->render('about.html', array('name' => 'Fabien'));
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
$app->get('/quiz/:id', function($id) use ($app, $twig) {
    echo $twig->render('quiz.html', array('id' => $id));
});

//where a professor creates a quiz
$app->get('/create_quiz', function() use ($app, $twig) {
    echo $twig->render('create_quiz.html');
});
//when a professor creates a quiz
$app->post('/create_quiz', function() use ($app, $twig, $db) {
    $quizTitle = $app->request->post('quiz_title');

    $quizDueDate= $app->request->post('quiz_due_date');
    $quizDueTime= $app->request->post('quiz_due_time');
    
    $quizDue = $quizDueDate .= $quizDueTime;
    $sql = "INSERT INTO quzzies (, last_name) VALUES ('John', 'Doe');";
    $users = $db->query($sql);
    echo $twig->render('create_quiz.html');
    $db = null;
});

?>