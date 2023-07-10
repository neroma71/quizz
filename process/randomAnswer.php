<?php
    $statement = $db->prepare("SELECT * FROM questions WHERE id = 1");
    $statement->execute();
    $question = $statement->fetch();

    do{
        
    }while($bool)
?>