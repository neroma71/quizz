<section class="quizz">
        <div class="question">
            <p>
            <?php include('process/randomQuestion.php'); ?>
            </p>
        </div>
        <?php include("process/traitement.php"); ?> 
        <form action="" method="post">
         
            <input type="submit" name="answer" value="<?= $reponses[0] ?>" class="btn">
            <input type="submit" name="answer" value="<?= $reponses[1]  ?>" class="btn">
            <input type="submit" name="answer" value="<?= $reponses[2]  ?>" class="btn">
            <input type="submit" name="answer" value="<?= $reponses[3] ?>" class="btn">

    </section>