<?php

/**
 * Block Name: Portfolio page heading
 *
 * This is the template that displays the Portfolio page heading block.
 */

$title = get_field('title');
$text = get_field('text');
?>
<div class="portfolio-heading">
    <img src="<?= IMAGES ?>/portfolio-page-bg.png" class="portfolio-heading__bg">
    <?php if ($title != '') : ?>
        <h1 class="portfolio-heading__title"><?= $title ?></h1>
    <?php endif ?>
    <?php if ($text) : ?>
        <p class="portfolio-heading__text text-lighter"><?= $text ?></p>
    <?php endif; ?>
</div>