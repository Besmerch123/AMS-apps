<?php

/**
 * Block Name: Trust us
 *
 * This is the template that displays the Trust us block.
 */
$title = get_field('section_title');
$subtitle = get_field('section_subtitle');
$cards = get_field('cards');
$id = $block['id'];
?>
<section class="trust-us section brand-bg">
   <div class="container">
      <?php if ($title) { ?>
         <h2 class="section-title"><?= $title ?></h2>
      <?php } ?>
      <?php if ($subtitle) { ?>
         <p class="section-subtitle"><?= $subtitle ?></p>
      <?php } ?>
      <?php if ($cards) : ?>
         <div class="trust-us__slider" id="trus-us-<?= $id ?>">
            <?php foreach ($cards as $card) : ?>
               <div class="card">
                  <?php if ($card['author']) : ?>
                     <div class="author">
                        <?php if ($card['author']['avatar']) { ?>
                           <div class="avatar"><img src="<?= $card['author']['avatar']['sizes']['medium'] ?>"></div>
                        <?php } ?>
                        <?php if ($card['author']['name']) { ?>
                           <h4 class="author__name"><?= $card['author']['name'] ?></h4>
                        <?php } ?>
                        <?php if ($card['author']['caption']) { ?>
                           <span class="author__specs"><?= $card['author']['caption'] ?></span>
                        <?php } ?>
                     </div>
                  <?php endif ?>
                  <?php if ($card['text']) { ?>
                     <p class="card__content"><?= $card['text'] ?></p>
                  <?php } ?>
               </div>
            <?php endforeach ?>
         </div>
      <?php endif ?>
      <div class="controls">
         <button class="prev custom-slick-arrow" id="prev-<?= $id ?>" aria-label="Previous" type="button">Prev</button>
         <button class=" next custom-slick-arrow" id="next-<?= $id ?>" aria-label="Next" type="button">Next</button>
      </div>
   </div>
</section>
<script>
   jQuery(document).ready(function() {
      jQuery('#trus-us-<?= $id ?>').slick({
         slidesToShow: 3,
         centerMode: true,
         prevArrow: jQuery('#prev-<?= $id ?>'),
         nextArrow: jQuery('#next-<?= $id ?>'),
         variableWidth: true,
         responsive: [{
            breakpoint: 575,
            settings: {
               centerPadding: '15px',
            }
         }]
      });
   });
</script>