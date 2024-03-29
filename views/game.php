<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game</title>
    <link rel="stylesheet" href="../public/css/style.css">
    <script type="application/javascript" src="../public/javascript/script.js"></script>
</head>
<body>
    <h1>Game (Question <?php echo $counter; ?>/5)</h1>
    <h2><?php echo $username; ?>'s Turn</h2>
    <h3><?php echo $question->getText(); ?></h3>
    <form action="/save-answer" method="post" onsubmit="validateGameFields(event);">
        <?php
            foreach ($answers as $key=>$answer) {
        ?>
                <label><input type="radio" name="answer" id="<?php echo $key; ?>" value="<?php echo $answer; ?>"> <?php echo $answer; ?></label><br>
        <?php
            }
        ?>
        <input type="hidden" name="question_id" id="question_id" value="<?php echo $questionId;?>">
        <input type="hidden" name="game_id" id="game_id" value="<?php echo $gameId;?>">
        <br>
        <input type="submit" value="Save Answer">
    </form>
</body>
</html>