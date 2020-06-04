<?php

/**
 * Block Name: Columns cards
 *
 * This is the template that displays the Columns cards block.
 */
$section_title = get_field('columns_section_title');
$section_subtitle = get_field('columns_section_subtitle');
$column_cards = get_field('column_cards');

?>
<section class="brand-bg section">
   <div class="container">
      <?php if ($section_title) { ?>
         <h2 class="section-title"><?= $section_title ?></h2>
      <?php } ?>
      <?php if ($section_subtitle) { ?>
         <p class="section-subtitle"><?= $section_subtitle ?></p>
      <?php } ?>
      <?php if ($column_cards) { ?>
         <div class="columns">
            <?php foreach ($column_cards as $card) : ?>
               <div class="card">
                  <?php if ($card['card_icon']) { ?>
                     <img src="<?= $card['card_icon']['sizes']['medium'] ?>" class="icon">
                  <?php } ?>
                  <?php if ($card['card_title']) { ?>
                     <h3 class="card__title"><?= $card['card_title'] ?></h3>
                  <?php } ?>
                  <?php if ($card['card_text']) { ?>
                     <div class="card__content text-darker"><?= $card['card_text'] ?></div>
                  <?php } ?>
               </div>
            <?php endforeach ?>
         </div>
      <?php } ?>
   </div>
</section>