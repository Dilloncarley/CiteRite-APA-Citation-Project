<?php 
//home page
$app->get('/', function () use ($app, $twig) {
    
    echo $twig->render('home.html', array('name' => 'Fabien','app' => $app));

});

//login page
$app->get('/login', function() use ($app, $twig) {
    echo $twig->render('login.html', array('name' => 'Fabien','app' => $app));
});

//about page
$app->get('/about', function() use ($app, $twig)  {
    echo $twig->render('about.html', array('name' => 'Fabien','app' => $app));
});

//professor dashboard
$app->get('/professor-dashboard', function() use ($app, $twig)  {
    echo $twig->render('professor-dashboard.html', array('app' => $app));
});


//student dashboard
$app->get('/student-dashboard', function() use ($app, $twig)  {
    echo $twig->render('student-dashboard.html', array('app' => $app));
});

//specific quiz page
$app->get('/quiz/:id', function($id) use ($app, $twig) {
    echo $twig->render('quiz.html', array('id' => $id,'app' => $app));
});

//404 page
$app->get('/404', function() use ($app, $twig)  {
    echo $twig->render('404.html', array('app' => $app));
});

//where a professor creates a quiz
$app->get('/create_quiz', function() use ($app, $twig) {
    echo $twig->render('create_quiz.html',array('app' => $app));
});

//when a professor creates a quiz
$app->post('/create_quiz', function() use ($app, $twig, $db) {
    $quizTitle = $app->request->post('quiz_title');
    $numQuizQuestions = $app->request->post('num_questions');
    $quizDueDate= $app->request->post('quiz_due_date');
    $quizDueTime= $app->request->post('quiz_due_time');

    //convert quiz due date and time to timestamp
    $time_in_24_hour_format  =   date("H:i", strtotime($quizDueTime));
    $timeStamp = $quizDueDate .= " " . $time_in_24_hour_format . ":00";

    $sql = "INSERT INTO quizzes (due, title) VALUES ('$quizDateTime', '$quizTitle');";
    $insertQuizQuery= $db->query($sql);
    if($insertQuizQuery) // was query a success?
    {
        //get id of the created quiz
        $quiz_id = $db->lastInsertId();
        $app->response->redirect('/edit_quiz'.'/'.$quiz_id, 303);

    } else {
        echo $twig->render('create_quiz.html', array('error' => "Something went wrong..... Please try again.",'app' => $app));
    }
    $db = null;
});

//route when professor is adding questions to quiz
$app->get('/edit_quiz/:quizid', function($quizId) use ($app, $twig, $db) {
 
    $sql = "SELECT title FROM quizzes WHERE id='$quizId'";
    $quizTitle = $db->query($sql)->fetchColumn();

    $dateSql = "SELECT due FROM quizzes WHERE id='$quizId'";
    $quizDueDate = $db->query($dateSql)->fetchColumn();

    
    if($quizTitle && $quizDueDate ) // were queries a success?
    {
        //split timestamp into date and 12 hour time
        $splitTimeStamp = explode(" ", (string) $quizDueDate);
        $date = $splitTimeStamp[0];
        $time = date("g:i a", strtotime($splitTimeStamp[1]));

        echo $twig->render('edit_quiz.html', array('quizId'=> $quizId, 'title' =>  $quizTitle, 'date' =>   $date, 'time' => $time));
       
    } else {
        $app->response->redirect('/404');
        
    }
    
});

$app->post('/update_quiz', function() use ($app, $db) {
   
    $req = $app->request();
    $quizId = json_encode($req->post('quizId'));
    $quizUpdatedTitle = json_encode($req->post('quiz_title'));
    $quizUpdatedDate =  $req->post('date');
    $quizUpdatedTime = $req->post('time');
    
    $time_in_24_hour_format  =   date("H:i", strtotime($quizUpdatedTime));
    $timeStamp = $quizUpdatedDate .= " " . $time_in_24_hour_format . ":00";

    //quiz id check
    $idSql = "SELECT id FROM quizzes WHERE id=$quizId";
    $quizIdQuery = $db->query($idSql)->fetchColumn();

    if($quizIdQuery) { // was query a success?
        $sql = "UPDATE quizzes SET title=$quizUpdatedTitle, due='$timeStamp' WHERE id=$quizId";
        $updateQuizQuery= $db->query($sql);
        $response = 1;  

    } else {
        $response = 0;  
    }
    
    $res = new \Slim\Http\Response();
    $res->setStatus(400);
    $res->headers->set('Content-Type', 'application/json');
    echo $response;
  
});
?>