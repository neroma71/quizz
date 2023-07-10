<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/quizz.css">
</head>
<body>
    <section class="quizz">
        <div class="question">
            <p>Quelle est la couleur du cheval blanc d'Henri Quatre ?</p>
        </div>
        <?php include("../process/randomAnswer.php"); ?> 
        <form action="" method="post">
            <input type="submit" name="answer" value="<?= $reponsesRand[0] ?>" class="btn">
            <input type="submit" name="answer" value="<?= $reponsesRand[1] ?>" class="btn">
            <input type="submit" name="answer" value="<?= $reponsesRand[2] ?>" class="btn">
            <input type="submit" name="answer" value="<?= $reponsesRand[3] ?>" class="btn">
        </form>
    </section>
</body>
</html>
