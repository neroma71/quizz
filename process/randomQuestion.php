<?php
require_once('connexion.php');
//création d'un tableau contenant les id des questions piochés aléatoirement dans la BDD
if(!isset($_SESSION['questions'])){
    $statement = $db->prepare("SELECT idQuestion, question FROM questions ORDER BY RAND() LIMIT 10 ");
    $statement->execute();
    $questions = $statement->fetchALL();
    $index = 0;
    //le tableau des id des questions est stockés en session pour pouvoir êtres utilisé sur les autres pages
    foreach($questions as $question){
        $_SESSION['questions'][$index] = $question['idQuestion'];
        $index++;
    }
}
//remise à zéro du score en début de quizz
if(!isset($_SESSION['score'])){
    $_SESSION['score'] = 0;
}

//affiche la première question dans le tableau des questions
$statement = $db->prepare("SELECT * FROM questions WHERE idQuestion ='". $_SESSION['questions'][0] . "'");
$statement->execute();
$question = $statement->fetch();

echo $question['question'];

?>