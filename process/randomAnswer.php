<?php
require_once('connexion.php');
$i = $_SESSION['index']; 
    $statement = $db->prepare("SELECT answer1,answer2,answer3,goodanswer FROM questions WHERE idquestion = '$GLOBALS[$i]'");
    $statement->execute();
    $question = $statement->fetch();

    $reponses= [0=>$question[0], 1=>$question[1],2=>$question[2], 3=>$question[3]];
       shuffle($reponses);
 
   
    if(isset($_POST['answer'])){
          $answer = $_POST['answer'];  
          $i = $_SESSION['index']; 
    $statement = $db->prepare("SELECT goodanswer FROM questions WHERE idquestion = '$GLOBALS[$i]'");
    $statement->execute();
    $reponse = $statement->fetch();

    if($reponse['goodanswer'] == $answer){
        echo"<p id='good' class='reponse'>Bonne réponse</p>";
       
    }else{
        echo"<p id='bad' class='reponse'>Mauvaise réponse</p>";
    }
    $_SESSION['index']+=1;
}

?>