<?php
<<<<<<< HEAD
$dns = 'mysql:host=localhost;dbname=quizz';
$user = 'root';
$password = '';

try{
    $db = new PDO( $dns, $user, $password);
    // echo "connexion établi" ;

}
catch (Exception $message){
    echo "ya un problème de soucis<br>" . "<pre>$message</pre>" ;
}
=======
    $dns = 'mysql:host=localhost;dbname=quizz' ;
    $user = 'root';
    $password = '';

    try{
        $db = new PDO($dns, $user, $password);
    }
    catch(Exception $message){
        echo "impossible de se connectre" . "<pre>$message</pre>";
    }

>>>>>>> quizz
?>