<?php

/**
 * Block Name: Testimonial
 *
 * This is the template that displays the Hero block.
 */

$hero_title = get_field('hero_title');
$hero_subtitle = get_field('hero_subtitle');
$hero_button = get_field('hero_button');
$video = get_field('hero_video');
$featured_in = get_field('featured_in');
?>
<section class="hero">
   <div class="container">
      <div class="top-section">
         <div class="hero__content">
            <?php if ($hero_title) : ?>
               <h1 class="hero__title"><?= $hero_title ?></h1>
            <?php endif ?>
            <?php
            if ($hero_subtitle) : ?>
               <p class="subtext text-lighter"><?= $hero_subtitle ?></p>
            <?php endif ?>
            <?php if ($hero_button) { ?>
               <a href="<?= $hero_button['link_to'] ?>" class="waves-effect waves-light brand-btn"><?= $hero_button['button_text'] ?></a>
            <?php } ?>
         </div>
         <?php if ($video) : ?>
            <div class="video">
               <a class="play-btn" data-video="<?= videoSRC($video['video']) ?>">
                  <img src="<?= IMAGES ?>/play.svg" alt="">
               </a>
               <img class="placeholder" src="<?= $video['placeholder']['sizes']['medium_large'] ?>">
            </div>
         <?php endif ?>

      </div>
      <?php if ($featured_in) { ?>
         <div class="featured">
            <?php if ($featured_in['title']) { ?>
               <span class="featured__title"><?= $featured_in['title'] ?>
               </span>
            <?php } ?>
            <?php foreach ($featured_in['images'] as $item) : ?>
               <div class="img-wrap">
                  <img src="<?= $item['image']['sizes']['medium'] ?>">
               </div>
            <?php endforeach ?>
         </div>
      <?php } ?>
   </div>
</section>