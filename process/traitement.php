<?php
    //récupère les 4 réponses à la question affichée à l'écra,
    $statement = $db->prepare("SELECT answer1,answer2,answer3,goodanswer FROM questions WHERE idquestion = '".$_SESSION['questions'][0] ."'");
    $statement->execute();
    $question = $statement->fetch();

    //stocke le réponse dans un tableau qui est ensuite mélangé pour que la bonne réponse soit placé à un endroit aléatoire parmis les 4 réponses
    $reponses= [0=>$question[0], 1=>$question[1],2=>$question[2], 3=>$question[3]];
    shuffle($reponses);
 
    
    //rentre dans la condition lorsque l'utilisateur appui sur un des boutons pour sélectionner une des réponses
    if(isset($_POST['answer'])){
        //stocke la réponse en session, la vérification, pour savoir si la réponse est bonne ou non se fera dans la page result
        $_SESSION['reponse'] = $_POST['answer'];
        $_SESSION['reps'] = $reponses;
        
        $statement = $db->prepare("SELECT goodanswer FROM questions WHERE idquestion = '".$_SESSION['questions'][0] ."'");
        $statement->execute();
        $reponse = $statement->fetch();

        header('location: ../partials/result.php');
}

?>