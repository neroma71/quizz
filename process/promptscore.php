<?php
    $statement = $db->prepare("SELECT * FROM scores INNER JOIN users ON Users.id = scores.idUsers ORDER BY score DESC");
    $statement->execute();
    $scores = $statement->fetchALL();
    $top = 1;
    foreach($scores as $score){
        echo '<p>' . $top . '- ' . $score['pseudo'] .' score :'.$score['score'] . '</p>';
        $top++;
    }
?>