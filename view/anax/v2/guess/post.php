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
    <p>Guess a number between 1 and 100. You have <?= $game->tries() ?> left.</p>

    <form method="POST">
        <input type="hidden" name="number" value="<?= $game->number() ?>">
        <input type="hidden" name="tries" value="<?= $game->tries() ?>">
        <input type="text" name="guess" value="<?= $guess ?>" autofocus>
        <input type="submit" name="doGuess" value="Make a Guess">
        <input type="submit" name="doCheat" value="Cheat">
        <input type="submit" name="doReset" value="Reset game">
    </form>

    <?php if (isset($res)) : ?>
        <p>Your guess <?=$guess?> is <?=$res?></p>
    <?php endif; ?>

    <?php if (isset($_POST["doCheat"])) : ?>
        <p>By cheating you learned that the secret number is: <?= $game->number() ?></p>
    <?php endif; ?>
</body>
