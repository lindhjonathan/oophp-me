<?php
/**
 * Require autoloader and config
 */
require "config.php";
require "autoload.php";

$title = "Guess my number game using POST";

//Get game variables from GET array
$number = $_POST["number"] ?? -1;
$tries  = $_POST["tries"]  ?? 6;
$guess  = $_POST["guess"]  ?? null;

$game = new Guess($number, $tries);

// If reset button is pushed, reset the game using GET
if (isset($_POST['doReset'])) {
    $game->random();
    $_POST["number"] = $game->number();
    $_POST["tries"]  = $game->tries();
    header("Location: index_post.php");
    exit;
}

$res = null;
if (isset($_POST["doGuess"])) {
    $res = $game->makeGuess($guess);
}

?><!doctype html>
<meta charset="utf-8">
<title><?= $title ?></title>
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
