<?php


        $_SESSION['index'] = 0;
    
        $GLOBALS = [];
        $statement = $db->prepare("SELECT idQuestion, question FROM questions");
        $statement->execute();
        $questions = $statement->fetchALL();
        $index = 0;
        foreach($questions as $question){
            $GLOBALS[$index] = $question['idQuestion'];
            $index++;
        }
    
        shuffle($GLOBALS);
        $_SESSION['rand'] = false;
   
    

$i = $_SESSION['index'];
$statement = $db->prepare("SELECT * FROM questions WHERE idQuestion ='$GLOBALS[$i]'");
$statement->execute();
$question = $statement->fetch();

echo $question['question'];

?>