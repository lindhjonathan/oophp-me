<?php
/**
 * Require autoloader and config
 */
require "config.php";
require "autoload.php";

$title = "Guess my number game using GET";

//Get game variables from GET array
$number = $_GET["number"] ?? -1;
$tries  = $_GET["tries"]  ?? 6;
$guess  = $_GET["guess"]  ?? null;

$game = new Guess($number, $tries);

// If reset button is pushed, reset the game using GET
if (isset($_GET['reset'])) {
    $game->random();
}

$res = null;
if (isset($_GET["doGuess"])) {
    $res = $game->makeGuess($guess);
}

?><!doctype html>
<meta charset="utf-8">
<title><?= $title ?></title>
<h1><?= $title ?></h1>
<body>
    <p>Guess a number between 1 and 100. You have <?= $game->tries() ?> left.</p>

    <form method="GET">
        <input type="hidden" name="number" value="<?= $game->number() ?>">
        <input type="hidden" name="tries" value="<?= $game->tries() ?>">
        <input type="text" name="guess" value="<?= $guess ?>" autofocus>
        <input type="submit" name="doGuess" value="Make a Guess">
        <input type="submit" name="doCheat" value="Cheat">
    </form>

    <p>
        <a href="?reset">Reset the game</a>
    </p>

    <?php if (isset($res)) : ?>
        <p>Your guess <?=$guess?> is <?=$res?></p>
    <?php endif; ?>

    <?php if (isset($_GET["doCheat"])) : ?>
        <p>By cheating you learned that the secret number is: <?= $game->number() ?></p>
    <?php endif; ?>
</body>
