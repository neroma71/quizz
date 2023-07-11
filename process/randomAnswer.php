<?php

    $i=$_SESSION['index'];
    $statement = $db->prepare("SELECT answer1,answer2,answer3,goodanswer FROM questions WHERE idquestion = '$GLOBALS[$i]'");
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

    if(isset($_POST['answer']) && $_POST['answer']!= ''){
    
    $_SESSION['reponse']= $_POST['answer']; 

    $i=$_SESSION['index'];
    $statement = $db->prepare("SELECT goodanswer FROM questions WHERE idquestion = '$GLOBALS[$i]'");
    $statement->execute();
    $reponse = $statement->fetch();
    var_dump($reponse['goodanswer']);
        var_dump($_SESSION['reponse']);
    if($reponse['goodanswer'] == $_SESSION['reponse']){
        echo"<p>Bonne réponse</p>";
        
    } else{
        echo"<p>Mauvaise réponse</p>";
    }
 }
 $_SESSION['index'] = $_SESSION['index'] +1;

?>