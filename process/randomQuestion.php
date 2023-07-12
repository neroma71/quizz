<?php

if(!isset($_SESSION['questions'])){
    
    $statement = $db->prepare("SELECT idQuestion, question FROM questions ORDER BY RAND() LIMIT 10 ");
    $statement->execute();
    $questions = $statement->fetchALL();
    $index = 0;
    foreach($questions as $question){
        $_SESSION['questions'][$index] = $question['idQuestion'];
        $index++;
    }
}

if(!isset($_SESSION['score'])){
    $_SESSION['score'] = 0;
}
    
$statement = $db->prepare("SELECT * FROM questions WHERE idQuestion ='". $_SESSION['questions'][0] . "'");
$statement->execute();
$question = $statement->fetch();

echo $question['question'];

?>