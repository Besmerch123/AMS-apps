<?php

/**
 * Block Name: Case testimonial
 *
 * This is the template that displays the Case testimonial block.
 */
$video = get_field('video');
$author = get_field('author');
$text = get_field('text');
$button = get_field('button');
$alignment = get_field('alignment'); ?>
<section class="case-tectimonial active-bg">
   <div class="testimonial container flex <?= $alignment ?>">
      <?php if ($video['video_embed'] && $video['placeholder']) : ?>

         <div class="video">
            <a class="play-btn" data-video="<?= videoSRC($video['video_embed']) ?>">
               <img src="<?= IMAGES ?>/play.svg">
            </a>
            <img class="placeholder" src="<?= $video['placeholder']['sizes']['large'] ?>">
         </div>

      <?php endif ?>
      <div class="testimonial__content <?= $alignment ?>">
         <?php if (!empty($author)) : ?>
            <div class="author">
               <?php if ($author['avatar']) { ?>
                  <div class="author__avatar"><img src="<?= $author['avatar']['sizes']['medium'] ?>"></div>
               <?php } ?>
               <?php if ($author['name']) : ?>
                  <h4 class="author__name"><?= $author['name'] ?></h4>
               <?php endif ?>
               <?php if ($author['caption']) : ?>
                  <span class="author__specs"><?= $author['caption'] ?></span>
               <?php endif ?>
            </div>
         <?php endif ?>
         <?php if ($text != '') : ?>
            <p class="testimonial__content_text"><?= $text ?></p>
         <?php endif ?>
         <?php if (!empty($button)) : ?>
            <a href="<?= $button['link'] ?>" class="brand-btn btn-transparent waves-effect waves-teal"><?= $button['text'] ?></a>
         <?php endif ?>
      </div>
   </div>
</section>