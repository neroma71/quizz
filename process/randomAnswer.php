<?php
require_once('connexion.php');

    $statement = $db->prepare("SELECT answer1,answer2,answer3,goodanswer FROM questions WHERE idquestion = 1");
    $statement->execute();
    $question = $statement->fetch();

    $reponses= [0=>$question[0], 1=>$question[1],2=>$question[2], 3=>$question[3]];
    $reponsesRand = [];


    for($i=0; $i<=3;$i++){
        $bool = true;
        do{
            $rand = rand(0,3);
            if(empty($reponsesRand[$rand])){
                $reponsesRand[$rand] = $reponses[$i];
                $bool = false;
            }
        }while($bool);
    }
//test sur la réponse
   
    if(isset($_POST['answer'])){
    
    $answer = $_POST['answer'];  
    $statement = $db->prepare("SELECT goodanswer FROM questions WHERE idquestion = 1");
    $statement->execute();
    $reponse = $statement->fetch();

    if($reponse['goodanswer'] == $answer){
        echo"<p>Bonne réponse</p>";
        
    } else{
        echo"<p>Mauvaise réponse</p>";
    }
 }



?>