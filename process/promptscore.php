<?php
    
    $score = $_SESSION['score'];
    $iduser = $_SESSION['idUser'];
    

    $sqlQuery = 'INSERT INTO scores(idUsers, score)
    VALUES (?,?)';
    $insertPatient = $db->prepare($sqlQuery);
    //relie la requête sql avec les données rentrées dans le formulaire
    $insertPatient->execute([
        $iduser,
        $score
  ]);

    $statement = $db->prepare("SELECT * FROM scores INNER JOIN users ON Users.id = scores.idUsers ORDER BY score DESC LIMIT 10");
    $statement->execute();
    $scores = $statement->fetchALL();
    $top = 1;

  foreach($scores as $score){
    echo '<p>' . $top . '- ' . $score['pseudo'] .' score :'.$score['score'] . '</p>';
    $top++;
}

session_unset();
?>
