<?php
    $statement = $db->prepare("SELECT * FROM questions WHERE idquestion = '".$_SESSION['questions'][0] ."'");
    $statement->execute();
    $reponse = $statement->fetch();

?>