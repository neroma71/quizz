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
                <?php include('../process/promptresult.php');?>
            
            </p>
        </div>
    
     
    <form method="post">
        <input type="submit" name="next" value="suivant" class="btn2">
    </form>
        

</section>
</body>
</html>