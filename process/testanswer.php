<?php

    $statement = $db->prepare("SELECT goodanswer FROM questions WHERE idquestion = '$GLOBALS[$i]'");
    $statement->execute();
    $reponse = $statement->fetch();

    var_dump($_SESSION['index']);
?>