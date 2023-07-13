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

                if($_SESSION['reponse'] == $question['goodanswer']){
                    echo'<p>Gagné</p>';
                    $_SESSION['score']+=0.5;
                }else{
                    echo'<p>Perdu</p>';
                }
                ?>
            </p>
        </div>
        <?php include("../process/testanswer.php"); ?> 
     
    <form method="post">
        <input type="submit" name="next" value="suivant" class="btn2">
    </form>
        <?php 
            if(isset($_POST['next'])){
                array_splice($_SESSION['questions'],0,1);
                var_dump($_SESSION['questions']);

                if(count($_SESSION['questions'])>0){
                    header('location: ../process/main.php');
                }else{
                    unset($_SESSION['questions']);
                    header('location: score.php');
                }  
            }
        ?>

</section>
</body>
</html>