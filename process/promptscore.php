<?php
    
    $score = $_SESSION['score'];
    $iduser = $_SESSION['idUser'];
    
    $req = $db->prepare("SELECT pseudo FROM users WHERE id = '$iduser' ");

    $req->execute();

    $pseudo = $req->fetch();

    echo "<p class='score_perso'>bonjour " .$pseudo[0]. " vote score est de ". $score."</p>";

    $sqlQuery = 'INSERT INTO scores(idUsers, score) VALUES (?,?)';
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
    echo '<p class="score_all_users">' . $top . '- ' . $score['pseudo'] .' score :'.$score['score'] . '</p>';
    $top++;
}

session_unset();
?>
