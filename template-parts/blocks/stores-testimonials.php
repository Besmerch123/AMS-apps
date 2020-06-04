<?php

/**
 * Block Name: Stores Testimonials
 *
 * This is the template that displays the Stores Testimonials block.
 */
$caseID = get_the_id();
$case_icon = get_field('case_icon', $caseID);
$heading = get_field('heading');
$testimonials = get_field('testimonials'); ?>

<div class="store-testimonials">

   <div class="store-caption">
      <img src="<?= $case_icon['sizes']['medium'] ?>" class="app-icon">
      <img src="<?= $heading['sizes']['large'] ?>" class="app-heading">
   </div>
   <?php if (!empty($testimonials)) { ?>
      <div class="testimonials">
         <?php foreach ($testimonials as $testimonial) : ?>
            <img src="<?= $testimonial['sizes']['large'] ?>">
         <?php endforeach ?>
      </div>
   <?php } ?>

</div>