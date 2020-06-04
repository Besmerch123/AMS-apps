<?php

/**
 * Block Name: Process
 *
 * This is the template that displays the Process block.
 */

$flow = get_field('flow');
$process_image = get_field('process_image');
$processClass = 'process__' . str_replace('img-', '', $process_image);
$nubmber_of_block = get_field('nubmber_of_block');
$process_title = get_field('process_title');
$content = get_field('content');
$link_section = get_field('link_section');

$images = [
   'img-1' => IMAGES . '/process/img-1-min.png',
   'img-2' => IMAGES . '/process/img-2-min.png',
   'img-3' => IMAGES . '/process/img-3-min.png',
   'img-4' => IMAGES . '/process/img-4-min.png',
   'img-5' => IMAGES . '/process/img-5-min.png',
];

?>
<section class="container flex process <?= $flow . ' ' . $processClass ?>">
   <div class="process__image">
      <img src="<?= $images[$process_image] ?>" class="<?= $process_image ?>">
   </div>
   <div class="process__content">
      <div class="process__number">
         <span class="current"><?= $nubmber_of_block['current'] ?></span>
         <span class="all">/<?= $nubmber_of_block['all'] ?></span>
      </div>
      <h2 class="process__title"><?= $process_title ?></h2>
      <div class="process__text"><?= apply_filters('the_post', $content) ?></div>
      <?php if ($link_section['link_text'] && $link_section['link_to']) : ?>
         <div class="process__link">
            <?php if (!empty($link_section['icon'])) : ?>
               <img src="<?= $link_section['icon']['sizes']['thumbnail'] ?>">
            <?php endif ?>
            <a href="<?= $link_section['link_to'] ?>"><?= $link_section['link_text'] ?> <svg width="24" height="12" viewBox="0 0 24 12" xmlns="http://www.w3.org/2000/svg">
                  <path d="M23.725 5.33662C23.7248 5.33634 23.7245 5.33602 23.7242 5.33573L18.8256 0.460741C18.4586 0.0955381 17.865 0.0968971 17.4997 0.463928C17.1345 0.830912 17.1359 1.42449 17.5028 1.78974L20.7918 5.06273H0.9375C0.419719 5.06273 0 5.48245 0 6.00023C0 6.51801 0.419719 6.93773 0.9375 6.93773H20.7917L17.5029 10.2107C17.1359 10.576 17.1345 11.1696 17.4998 11.5365C17.865 11.9036 18.4587 11.9049 18.8256 11.5397L23.7242 6.66473C23.7245 6.66445 23.7248 6.66412 23.7251 6.66384C24.0923 6.29737 24.0911 5.70187 23.725 5.33662Z" />
               </svg>
            </a>
            <?php if (!empty($link_section['icons'])) : ?>
               <div class="icons">
                  <?php foreach ($link_section['icons'] as $oneIcon) : ?>
                     <img src="<?= $oneIcon['sizes']['thumbnail'] ?>">
                  <?php endforeach ?>
               </div>
            <?php endif ?>

         </div>
      <?php endif ?>
   </div>
</section>