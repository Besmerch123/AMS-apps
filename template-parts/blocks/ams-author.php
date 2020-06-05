<?php

/**
 * Block Name: AMS Author
 *
 * This is the template that displays the AMS Author block.
 */
global $post;
$avatar = get_avatar_url($post->post_author);
$authorName = get_the_author();
$post_date = get_the_time('F j, Y');
$socials = get_field('social_link');
?>

<div class="ams-author">
   <img src="<?= $avatar ?>" class="avatar">
   <div class="summary">
      <span class="author-name"><?= $authorName ?></span>
      <span class="summary__text"> <?= $post_date ?> / <?php if (function_exists('the_views')) {
                                                            the_views();
                                                         } ?></span>
   </div>
   <?php if (!empty($socials)) : ?>
      <div class="socials">
         <?php foreach ($socials as $social) : ?>
            <a href="<?= $social['link'] ?>" class="social-link">
               <img src="<?= $social[icon]['sizes']['thumbnail'] ?>" alt="">
            </a>
         <?php endforeach ?>
      </div>
   <?php endif ?>
</div>