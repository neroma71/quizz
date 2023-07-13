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
<body> <header>
        <h1>mon beau quiz</h1>
        <a href="../index.php" id="retour">Rejouer</a>
    </header>
<section class="quizz">
    <?php 
    include('../process/promptscore.php');
    ?>
</section>
</body>
</html>