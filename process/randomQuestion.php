<?php

if($_SESSION['rand']){
    $_SESSSION['index'] = 0;

    $GLOBALS = [];
    $statement = $db->prepare("SELECT idQuestion, question FROM questions");
    $statement->execute();
    $questions = $statement->fetchALL();
    $index = 0;
    foreach($questions as $question){
        $GLOBALS[$index] = $question['idQuestion'];
        $index++;
    }

    $_SESSION['rand'] = false;
}


$statement = $db->prepare("SELECT * FROM questions WHERE idQuestion ='$GLOBALS[$index]'");
$statement->execute();
$question = $statement->fetchALL();

var_dump($question)
?>