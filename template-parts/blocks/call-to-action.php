<?php

/**
 * Block Name: Call to action
 *
 * This is the template that displays the Call to action block.
 */
$title = get_field('title');
$content = get_field('content');
$button = get_field('button');
?>
<section class="active-bg cta">
   <div class="container">
      <?php if ($title || $content || $button) { ?>
         <div class="cta__content">
            <?php if ($title) { ?>
               <h3 class="cta__title"><?= $title ?></h3>
            <?php } ?>
            <?php if ($content) { ?>
               <p class="cta__text"><?= $content ?></p>
            <?php } ?>
            <?php if ($button['text'] && $button['link']) { ?>
               <a href="<?= $button['link'] ?>" class="brand-btn btn-transparent waves-effect waves-teal"><?= $button['text'] ?></a>
            <?php } ?>
         </div>
      <?php } ?>
   </div>
</section>