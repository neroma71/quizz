<?php

require_once('connexion.php');
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

$statement = $db->prepare("SELECT idQuestion, question FROM questions WHERE idQuestion ='$GLOBALS[$index]'");
$statement->execute();
$questions = $statement->fetchALL();
shuffle($GLOBALS);
var_dump($GLOBALS);
?>