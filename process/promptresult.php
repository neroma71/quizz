<?php 
    $statement = $db->prepare("SELECT * FROM questions WHERE idQuestion ='". $_SESSION['questions'][0] ."'");
    $statement->execute();
    $question = $statement->fetch();  
    echo $question['question'];
    //on compare la réponse selectionnée par le user et la compare avec la bonne réponse
    if($_SESSION['reponse'] == $question['goodanswer']){
        //si la réponse donnée est bonne , on indique que la réponse est bonne et on augmente son score
        echo'<div class="good"><p>Gagné</p></di>';
        $_SESSION['score']+=0.5;
    }else{
        //si la réponse n'est pas bonne, on indique 
        echo'<p>Perdu</p>';
    }
                
    if(isset($_POST['next'])){
        //supprime la première case du tableau de questions
        array_splice($_SESSION['questions'],0,1);
        //si le tableau de question n'est pas vide on redirige vers la page main pour avoir la prochaine question
        if(count($_SESSION['questions'])>0){
            header('location: ../process/main.php');
        }else{
            //si le tableau de questions est vide on regirige vers la page score pour afficher le score de l'utilisateur
            unset($_SESSION['questions']);
            header('location: score.php');
        }  
}
?>
