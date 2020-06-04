<?php

/**
 * Block Name: Testimonials
 *
 * This is the template that displays the Testimonials block.
 */
$title = get_field('section_title');
$subtitle = get_field('section_subtitle');
$testimonials = get_field('testimonials');
?>
<section class="testimonials section">
   <div class=" container">
      <?php if ($title) { ?>
         <h2 class="section-title"><?= $title ?></h2>
      <?php } ?>
      <?php if ($subtitle) { ?>
         <p class="section-subtitle"><?= $subtitle ?></p>
      <?php } ?>
      <?php if ($testimonials) { ?>
         <div class="testimonials__wrap">
            <?php foreach ($testimonials as $testimonial) : ?>
               <div class="testimonial flex">
                  <?php if ($testimonial['video']['video_embed'] && $testimonial['video']['placeholder']) : ?>
                     <div class="video">
                        <a class="play-btn" data-video="<?= videoSRC($testimonial['video']['video_embed']) ?>">
                           <img src="<?= IMAGES ?>/play.svg">
                        </a>
                        <img class="placeholder" src="<?= $testimonial['video']['placeholder']['sizes']['large'] ?>">
                     </div>
                  <?php endif ?>
                  <div class="card">
                     <?php if (!empty($testimonial['author'])) { ?>
                        <div class="author">
                           <?php if (!empty($testimonial['author']['name'])) { ?>
                              <h4 class="author__name"><?= $testimonial['author']['name'] ?></h4>
                           <?php } ?>
                           <?php if (!empty($testimonial['author']['caption'])) { ?>
                              <span class="author__specs"><?= $testimonial['author']['caption'] ?></span>
                           <?php } ?>
                        </div>
                     <?php } ?>
                     <?php if (!empty($testimonial['text'])) { ?>
                        <p class="card__content text-darker"><?= $testimonial['text'] ?></p>
                     <?php } ?>
                  </div>
               </div>
            <?php endforeach ?>
         </div>
      <?php } ?>
   </div>
</section>