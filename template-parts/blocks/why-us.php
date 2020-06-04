<?php

/**
 * Block Name: Why us
 *
 * This is the template that displays the Why us block.
 */

$main_section = get_field('why_us_main_section');
if ($main_section) {
   $main_section_icon = $main_section['icon']['sizes']['medium'];
}

$cards = get_field('cards');

?>
<section class="why-us">
   <div class="container">
      <?php if ($cards) : ?>
         <div class="why-us__cards">
            <?php foreach ($cards as $card) : ?>
               <div class="card">
                  <?php if ($card['icon']) { ?>
                     <div class="icon-bg-wrap">
                        <img src="<?= $card['icon']['sizes']['medium'] ?>" class="icon">
                     </div>
                  <?php } ?>
                  <?php if ($card['title']) { ?>
                     <h3 class="card__title"><?= $card['title'] ?></h3>
                  <?php } ?>
                  <?php if ($card['text']) { ?>
                     <p class="card__content text-lighter"><?= $card['text'] ?></p>
                  <?php } ?>
               </div>
            <?php endforeach ?>
         </div>
      <?php endif ?>
      <?php if ($main_section) { ?>
         <div class="why-us__main">
            <?php if ($main_section_icon) { ?>
               <div class="icon-bg-wrap">
                  <img src="<?= $main_section_icon ?>" class="icon">
               </div>
            <?php } ?>
            <?php if ($main_section['title']) { ?>
               <h2 class="why-us__main__title"><?= $main_section['title'] ?></h2>
            <?php } ?>
            <?php if ($main_section['subtitle']) { ?>
               <p class="subtext text-lighter"><?= $main_section['subtitle'] ?></p>
            <?php } ?>
            <?php if ($main_section['button_link'] && $main_section['button_text']) { ?>
               <a href="<?= $main_section['button_link'] ?>" class="brand-btn btn-transparent waves-effect waves-teal"><?= $main_section['button_text'] ?></a>
            <?php } ?>
         </div>
      <?php } ?>
   </div>
</section>