<?php

namespace Anax\View;

/**
 * Template file to render a view.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());

?>

<footer>
    <img class="footer-image" src="<?= asset("img/byline-logo.png") ?>" alt="Footer">
    <div class="footer-text">
        <p>Hemsidan är en del av kursen oophp</p>
        <p style="font-size: 14px;">Ansvarig utgivare: lindh.jonathan@gmail.com</p>
    </div>
</footer>
