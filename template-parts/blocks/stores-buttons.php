<?php

/**
 * Block Name: Stores buttons
 *
 * This is the template that displays the Stores buttons block.
 */
$caseID = get_the_id();
$case_icon = get_field('case_icon', $caseID);
$app_store = get_field('app_store');
$google_play = get_field('google_play'); ?>


<div class="stores-buttons container">
   <div class="icon-wrap">
      <img src="<?= $case_icon['sizes']['medium'] ?>">
   </div>
   <div class="buttons">
      <?php if ($app_store != '') { ?>
         <a href="<?= $app_store ?>" target="_blanc">
            <img src="<?= IMAGES ?>/app-store-grey.png" alt="App Store link">
         </a>
      <?php } ?>
      <?php if ($google_play != '') { ?>
         <a href="<?= $google_play ?>" target="_blanc">
            <img src="<?= IMAGES ?>/google-play-logo-grey.png" alt="Google Play link">
         </a>
      <?php } ?>
   </div>
</div>