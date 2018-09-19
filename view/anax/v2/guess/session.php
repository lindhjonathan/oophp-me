<?php

namespace Anax\View;

/**
 * Render content within an article.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());


?>
<h1><?= $title ?></h1>
<body>
    <p>Guess a number between 1 and 100. You have <?= $_SESSION["tries"] ?> left.</p>

    <form method="POST">
        <input type="hidden" name="number" value="<?= $_SESSION["number"] ?>">
        <input type="hidden" name="tries" value="<?= $_SESSION["tries"] ?>">
        <input type="text" name="guess" value="<?= $guess ?>" autofocus>
        <input type="submit" name="doGuess" value="Make a Guess">
        <input type="submit" name="doCheat" value="Cheat">
        <input type="submit" name="doReset" value="Reset game">
    </form>

    <?php if (isset($_POST['doGuess'])) : ?>
        <p>Your guess <?=$_SESSION["lastGuess"]?> is <?=$_SESSION["guess"]?></p>
    <?php endif; ?>

    <?php if (isset($_POST["doCheat"])) : ?>
        <p>By cheating you learned that the secret number is: <?= $_SESSION["number"] ?></p>
    <?php endif; ?>
</body>
