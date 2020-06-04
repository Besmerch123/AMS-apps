<?php

/**
 * Block Name: Contacts page heading
 *
 * This is the template that displays the Contacts page heading block.
 */

$title = get_field('title');
$content = get_field('content');
?>
<div class="contacts-heading">
    <?php if ($title != '') : ?>
        <h1 class="contacts-heading__title"><?= $title ?></h1>
    <?php endif ?>
    <?php if ($content) :
        echo apply_filters('the_content', $content);
    endif; ?>
</div>