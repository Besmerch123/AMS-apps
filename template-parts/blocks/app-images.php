<?php

/**
 * Block Name: Featured projects
 *
 * This is the template that displays the Featured projects block.
 */
$items = get_field('items');

?>

<div class="app-images">
   <?php foreach ($items as $item) : ?>
      <div class="img-wrap" style="background-color: <?= $item['background_color'] ?>;">
         <img src="<?= $item['image']['sizes']['large'] ?>">
      </div>
   <?php endforeach ?>
</div>