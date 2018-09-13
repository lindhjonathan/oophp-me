<?php

namespace Anax\View;

/**
 * Template file to render a view.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());


?><navbar class="top-nav">
<?php foreach ($navbar ?? [] as $item) : ?>
    <a href="<?= url($item["url"]) ?>" title="<?= $item["title"] ?>">
        <i class="material-icons"><?=$item["image"]?></i>
        <span class="icon-text"><?= $item["text"] ?></span>
    </a>
<?php endforeach; ?>
</navbar>
