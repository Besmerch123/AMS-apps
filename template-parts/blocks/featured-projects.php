<?php

/**
 * Block Name: Featured projects
 *
 * This is the template that displays the Featured projects block.
 */
$title = get_field('title');
$subtitle = get_field('subtitle');
$caseButton = get_field('cases_button');
$casesIDs = get_field('cases');
if (!empty($casesIDs)) {
   $cases = [];
   foreach ($casesIDs as $caseID) {
      $caseTitle = get_the_title($caseID);
      $image = get_field('case_secondary_image', $caseID);
      $caseLink = get_the_permalink($caseID);
      $cases[$caseID] = [
         'title'  => $caseTitle,
         'image'  => $image['sizes']['large'],
         'link'   => $caseLink,
      ];
   }
} ?>

<section class="featured brand-bg section">
   <div class="container center-align">
      <?php if ($title != '') : ?>
         <h3 class="section-title"><?= $title ?></h3>
      <?php endif ?>
      <?php if ($subtitle != '') : ?>
         <p class="section-subtitle"><?= $subtitle ?></p>
      <?php endif ?>
      <?php if (!empty($caseButton)) : ?>
         <a href="<?= $caseButton['link'] ?>" class="brand-btn btn-transparent waves-effect waves-teal"><?= $caseButton['text'] ?></a>
      <?php endif ?>
      <?php if (!empty($cases)) : ?>
         <div class="featured__cases">
            <?php foreach ($cases as $case) : ?>
               <a href="<?= $case['link'] ?>" class="featured__case">
                  <img src="<?= $case['image'] ?>" alt="" class="bg">
                  <div class="overlay"></div>
                  <img src="<?= $case['image'] ?>" alt="" class="main">
                  <div class="content">
                     <img src="<?= IMAGES ?>/app.svg" alt="" class="app-icon">
                     <h4 class="featured__case_title"><?= $case['title'] ?></h4>
                     <svg width="26" height="25" viewBox="0 0 26 25" class="featured__case_arrow" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 11.6346H22.4583L12.8333 2.03367L14.0507 0.662109L25.9673 12.5489L14.0507 24.4357L12.8333 23.0642L22.4583 13.4633H0V11.6346Z" fill="white" />
                     </svg>
                  </div>
               </a>
            <?php endforeach ?>
         </div>
      <?php endif ?>
   </div>
</section>