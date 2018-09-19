<?php
/**
 * Require autoloader and config
 */
require "config.php";
require "autoload.php";

$title = "Guess my number game using SESSION";

//Get current guess variables from POST
$guess  = isset($_POST["guess"]) ? $_POST["guess"] : null;

// start session
session_name(md5(__FILE__));
session_start();

$_SESSION = array();

// Start the game in session
$game = new Guess($_SESSION["number"] ?? -1, $_SESSION["tries"] ?? 6);
$_SESSION["number"] = $game->number();
$_SESSION["tries"] = $game->tries();

// If reset button is pushed, reset the game using POST
if (isset($_POST['reset']) || isset($_GET['reset'])) {
    $_SESSION = array();
    $game = new Guess(-1, 6);
    $_SESSION["number"] = $game->number();
    $_SESSION["tries"]  = $game->tries();
    header("Location: index_session.php");
    exit;
}

// If button doGuess is pressed, Make a guess with class method 'makeGuess'
if (isset($_POST["doGuess"])) {
    $_SESSION["guess"]      = $game->makeGuess($guess);
    $_SESSION["lastGuess"]  = $guess;
    $_SESSION["tries"]      = $game->tries();
}


?><!doctype html>
<meta charset="utf-8">
<title><?= $title ?></title>
<h1><?= $title ?></h1>
<body>
    <p>Guess a number between 1 and 100. You have <?= $_SESSION["tries"] ?> left.</p>

    <form method="POST">
        <input type="hidden" name="number" value="<?= $_SESSION["number"] ?>">
        <input type="hidden" name="tries" value="<?= $_SESSION["tries"] ?>">
        <input type="text" name="guess" value="<?= $guess ?>" autofocus>
        <input type="submit" name="doGuess" value="Make a Guess">
        <input type="submit" name="doCheat" value="Cheat">
    </form>

    <p>
        <a href="?reset">Reset the game</a>
    </p>

    <?php if (isset($_POST['doGuess'])) : ?>
        <p>Your guess <?=$_SESSION["lastGuess"]?> is <?=$_SESSION["guess"]?></p>
    <?php endif; ?>

    <?php if (isset($_POST["doCheat"])) : ?>
        <p>By cheating you learned that the secret number is: <?= $_SESSION["number"] ?></p>
    <?php endif; ?>
</body>
