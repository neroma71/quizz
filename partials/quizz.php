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
        <form action="../process/answer.php" method="post">
            <input type="submit" name="answer[]" value="blanc" class="btn">
            <input type="submit" name="answer[]" value="rouge" class="btn">
            <input type="submit" name="answer[]" value="bleu" class="btn">
            <input type="submit" name="answer[]" value="vert" class="btn">
        </form>
    </section>
</body>
</html>
