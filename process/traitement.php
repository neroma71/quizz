<?php

    $statement = $db->prepare("SELECT answer1,answer2,answer3,goodanswer FROM questions WHERE idquestion = '".$_SESSION['questions'][0] ."'");
    $statement->execute();
    $question = $statement->fetch();

    $reponses= [0=>$question[0], 1=>$question[1],2=>$question[2], 3=>$question[3]];
    shuffle($reponses);
 
    
    if(isset($_POST['answer'])){
        $_SESSION['reponse'] = $_POST['answer'];
        $_SESSION['reps'] = $reponses;
        $statement = $db->prepare("SELECT goodanswer FROM questions WHERE idquestion = '".$_SESSION['questions'][0] ."'");
        $statement->execute();
        $reponse = $statement->fetch();

        header('location: ../partials/result.php');
}

?>