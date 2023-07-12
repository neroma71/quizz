<?php
session_start();
require_once('../process/connexion.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/quizz.css">
</head>
<body>
    <header>
        <h1>mon beau quiz</h1>
    </header>
<section class="quizz">
        <div class="question">
            <p>
                
            <?php
                $statement = $db->prepare("SELECT * FROM questions WHERE idQuestion ='". $_SESSION['questions'][0] ."'");
                $statement->execute();
                $question = $statement->fetch();  
                echo $question['question'];
                var_dump($_SESSION['reps']);

                if($_SESSION['reponse'] == $question['goodanswer']){
                    echo 'Bonne réponse';
                }else{
                    echo'mauvaise réponse';
                }
                ?>
            </p>
        </div>
        <?php include("../process/testanswer.php"); ?> 
        <form>
            <input type="submit" name="answer" value="<?= $_SESSION['reps'][0] ?>" class="btn">
            <input type="submit" name="answer" value="<?= $_SESSION['reps'][1] ?>" class="btn">
            <input type="submit" name="answer" value="<?= $_SESSION['reps'][2] ?>" class="btn">
            <input type="submit" name="answer" value="<?= $_SESSION['reps'][3] ?>" class="btn">
        </form>
        <form method="post" action="">

                <input type="hidden"name="next" value="yes">
                <input type="submit" value="suivant">
        </form>
        <?php 
            if(isset($_POST['next'])){
                array_splice($_SESSION['questions'],0,1);
                var_dump($_SESSION['questions']);
                
                if(count($_SESSION['questions'])>0){
                    header('location: ../index.php');
                }else{
                    unset($_SESSION['questions']);
                    header('location: score.php');
                }
                
            }
        ?>

</section>