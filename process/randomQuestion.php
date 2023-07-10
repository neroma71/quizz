<?php

require_once('connexion.php');

$GLOBALS = [];
$statement = $db->prepare("SELECT idQuestion FROM questions");
$statement->execute();
$questions = $statement->fetchALL();
$index = 0;
foreach($questions as $question){
    $GLOBALS[$index] = $question['idQuestion'];
    $index++;
}

shuffle($GLOBALS);
var_dump($GLOBALS);
?>