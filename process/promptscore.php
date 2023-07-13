<?php
    
    $score = $_SESSION['score'];
    $iduser = $_SESSION['idUser'];
    //insertion du score du joueur dans la BDD
    $sqlQuery = 'INSERT INTO scores(idUsers, score) VALUES (?,?)';
    $insertPatient = $db->prepare($sqlQuery);
    $insertPatient->execute([
        $iduser,
        $score
  ]);
    // on récupère dans la BDD les 10 meilleurs scores 
    $statement = $db->prepare("SELECT * FROM scores INNER JOIN users ON Users.id = scores.idUsers ORDER BY score DESC LIMIT 10");
    $statement->execute();
    $scores = $statement->fetchALL();
    $top = 1;
  //on affiche les 10 meilleurs scores avec le nom du user qui a obtenu le score
  foreach($scores as $score){
    echo '<p>' . $top . '- ' . $score['pseudo'] .' score :'.$score['score'] . '</p>';
    $top++;
}
//fermeture de session
session_unset();
?>
