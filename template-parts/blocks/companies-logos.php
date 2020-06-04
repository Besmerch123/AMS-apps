<?php

/**
 * Block Name: Columns cards
 *
 * This is the template that displays the Columns cards block.
 */
$section_title = get_field('section_title');
$logos = get_field('logos');

?>
<section class="companies section">
   <div class="container">
      <?php if ($section_title) { ?>
         <h2 class="section-title"><?= $section_title ?></h2>
      <?php } ?>
      <?php if ($logos) { ?>
         <div class="logos">
            <?php foreach ($logos as $logo) { ?>
               <div class="img-wrap">
                  <img src="<?= $logo['sizes']['medium_large'] ?>">
               </div>
            <?php } ?>
         </div>
      <?php } ?>
   </div>
</section>