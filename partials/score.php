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
</head>
<body>
    <?php include('../process/promptscore.php'); ?>

    <a href="../index.php">Rejouer</a>
</body>
</html>