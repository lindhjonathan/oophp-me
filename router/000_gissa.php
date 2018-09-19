<?php
/**
 * Guess game specific routes.
 */
//var_dump(array_keys(get_defined_vars()));



/**
 * Guess my number with GET
 */
$app->router->get("gissa/get", function () use ($app) {
    $data = [
        "title" => "Guess my number using GET"
    ];

    //Get game variables from GET array
    $number = $_GET["number"] ?? -1;
    $tries  = $_GET["tries"]  ?? 6;
    $guess  = $_GET["guess"]  ?? null;

    $game = new \Jonathan\Guess\Guess($number, $tries);

    // If reset button is pushed, reset the game using GET
    if (isset($_GET['reset'])) {
        $game->random();
    }

    $res = null;
    if (isset($_GET["doGuess"])) {
        $res = $game->makeGuess($guess);
    }

    // Prepare $data for the view/page to render
    $data["game"]  = $game;
    $data["res"]   = $res;
    $data["guess"] = $guess;

    $app->view->add("anax/v2/guess/get", $data);

    return $app->page->render($data);
});

/**
 * Guess my number with POST
 */
$app->router->any(["GET", "POST"], "gissa/post", function () use ($app) {

    $data = [
        "title" => "Guess my number using POST"
    ];

     //Get game variables from GET array
    $number = $_POST["number"] ?? -1;
    $tries  = $_POST["tries"]  ?? 6;
    $guess  = $_POST["guess"]  ?? null;

    $game = new \Jonathan\Guess\Guess($number, $tries);

    // If reset button is pushed, reset the game using POST
    if (isset($_POST['doReset'])) {
        $game->random();
        $_POST["number"] = $game->number();
        $_POST["tries"]  = $game->tries();
        header("Location: post");
        exit;
    }

    $res = null;
    if (isset($_POST["doGuess"])) {
        $res = $game->makeGuess($guess);
    }


    // Prepare $data for the view/page to render
    $data["game"]  = $game;
    $data["res"]   = $res;
    $data["guess"] = $guess;

    $app->view->add("anax/v2/guess/post", $data);

    return $app->page->render($data);
});

/**
 * Guess my number with POST
 */
$app->router->any(["GET", "POST"], "gissa/session", function () use ($app) {
    $data = [
        "title" => "Guess my number using SESSION"
    ];

    //Get current guess variables from POST
    $guess  = isset($_POST["guess"]) ? $_POST["guess"] : null;


    // Start the game in session
    $game = new \Jonathan\Guess\Guess($_SESSION["number"] ?? -1, $_SESSION["tries"] ?? 6);
    $_SESSION = array();
    $_SESSION["number"]    = $game->number();
    $_SESSION["tries"]     = $game->tries();
    $_SESSION["lastGuess"] = null;

    // If reset button is pushed, reset the game using POST
    if (isset($_POST['doReset'])) {
        $_SESSION = array();
        $game->random();
        $_SESSION["number"] = $game->number();
        $_SESSION["tries"]  = $game->tries();
        header("Location: session");
        exit;
    }

    // If button doGuess is pressed, Make a guess with class method 'makeGuess'
    if (isset($_POST["doGuess"])) {
        $_SESSION["guess"]      = $game->makeGuess($guess);
        $_SESSION["lastGuess"]  = $guess;
        $_SESSION["tries"]      = $game->tries();
    }


    // Prepare $data for the view/page to render
    $data["game"]  = $game;
    $data["guess"] = $_SESSION["lastGuess"];

    $app->view->add("anax/v2/guess/session", $data);

    return $app->page->render($data);
});
