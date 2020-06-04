<?php

/**
 * Block Name: Columns cards
 *
 * This is the template that displays the Columns cards block.
 */
$workflow_title = get_field('workflow_title');
$workflow_subtitle = get_field('workflow_subtitle');
$button_text = get_field('workflow_button_text');
$button_link = get_field('workflow_button_link');
$workflow_slides = get_field('workflow_slides');
$id = $block['id'];

?>
<section class="workflow active-bg">
   <div class="container flex">
      <div class="content">
         <?php if ($workflow_title) { ?>
            <h2 class="workflow__title"><?= $workflow_title ?></h2>
         <?php } ?>
         <?php if ($workflow_subtitle) { ?>
            <p class="workflow__text"><?= $workflow_subtitle ?></p>
         <?php } ?>
         <?php if ($button_text && $button_link) { ?>
            <a href="<?= $button_link ?>" class="brand-btn btn-transparent waves-effect waves-teal"><?= $button_text ?></a>
         <?php } ?>
      </div>
      <?php if ($workflow_slides) { ?>
         <div class="slider-wrap">
            <div class="workflow__slider" id="workflow-<?= $id ?>">
               <?php foreach ($workflow_slides as $slide) : ?>
                  <div class="card">
                     <?php if ($slide['icon']) { ?>
                        <div class="icon-bg-wrap">
                           <img src="<?= $slide['icon']['sizes']['medium'] ?>" class="icon">
                        </div>
                     <?php } ?>
                     <?php if ($slide['title']) { ?>
                        <h3 class="card__title"><?= $slide['title'] ?></h3>
                     <?php } ?>
                     <?php if ($slide['text']) { ?>
                        <p class="card__content text-lighter"><?= $slide['text'] ?></p>
                     <?php } ?>
                  </div>
               <?php endforeach ?>
            </div>
            <div class="controls">
               <button class="prev custom-slick-arrow" id="workflow-prev-<?= $id ?>">Prev</button>
               <button class=" next custom-slick-arrow" id="workflow-next-<?= $id ?>">Next</button>
            </div>
         </div>
      <?php } ?>
   </div>
</section>
<script>
   jQuery(document).ready(function() {
      jQuery('#workflow-<?= $id ?>').slick({
         infinite: true,
         variableWidth: true,
         slidesToShow: 5,
         prevArrow: jQuery('#workflow-prev-<?= $id ?>'),
         nextArrow: jQuery('#workflow-next-<?= $id ?>'),
         responsive: [{
            breakpoint: 992,
            settings: {
               slidesToShow: 3,
            }
         }]
      });
   });
</script>