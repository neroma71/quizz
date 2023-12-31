<?php
    //rentre dans la boucle lorsque l'utilisateur appuie sur envoie et que l'inpu n'est pas vide
    if(!empty($_POST['username'])){
        //requête qui vérifie si le pseudo de l'utilisateur est déjà présent dans la base de donnée
        $pseudo = $_POST['username'];
        $statement = $db->prepare("SELECT * FROM users where pseudo = '$pseudo'");
        $statement->execute();
        $user = $statement->fetch();

    
    $statement = $db->prepare("SELECT idQuestion, question FROM questions");
    $statement->execute();
    $questions = $statement->fetchALL();

        //si $user retourne false alors le pseudo n'existe pas encore, on va donc le créer avec une requête insert
        if(!$user){
            //requête qui crée un pseudo dans la table user de la BDD
            $sqlQuery = 'INSERT INTO users(pseudo) VALUES (?)';
            $insertPatient = $db->prepare($sqlQuery);
            $insertPatient->execute([
            $_POST['username']
            ]);   
            //le dernier id inséré, ici l'id du user, est stocké dans une variable globale est sera utilisé sur les autres pages
            $_SESSION['idUser'] = $db->lastInsertId();

            header('location: ../process/main.php');
        } else{
            //$user n'est pas vide cela veut dire que la requête effectuée plus haut à trouver un utilisateur ayant ce pseudo
            $_SESSION['idUser'] = $user['id'];
            header('location: ../process/main.php');
        }
    }
?>
<section class="quizz">
    <form method="post" action="" class="login">
        <input type="text" name="username" class="btn" placeholder="username">
        <input type="submit"  class="btn">
    </form>
</section>

