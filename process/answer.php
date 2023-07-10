<?php
if(isset($_POST['answer'])){
    require_once("connexion.php");

    $req = $db->query('SELECT * FROM questions');
    
    $answer = $req->fetchAll();
}
foreach($answer as $answers){
  
}

?>