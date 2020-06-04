<?php

/**
 * Block Name: Trust us
 *
 * This is the template that displays the Trust us block.
 */
$title = get_field('section_title');
$subtitle = get_field('section_subtitle');
$members = get_field('team_members');
?>
<section class="about-us section">
   <div class="container">
      <?php if ($title) { ?>
         <h2 class="section-title"><?= $title ?></h2>
      <?php } ?>
      <?php if ($subtitle) { ?>
         <p class="section-subtitle"><?= $subtitle ?></p>
      <?php } ?>
      <?php if ($members) { ?>
         <div class="team flex">
            <?php foreach ($members as $member) : ?>
               <div class="card">
                  <?php if ($member['author']) { ?>
                     <div class="author">
                        <?php if ($member['author']['avatar']) { ?>
                           <div class="avatar"><img src="<?= $member['author']['avatar']['sizes']['medium'] ?>"></div>
                        <?php } ?>
                        <?php if ($member['author']['name']) { ?>
                           <h4 class="author__name"><?= $member['author']['name'] ?></h4>
                        <?php } ?>
                        <?php if ($member['author']['caption']) { ?>
                           <span class="author__specs"><?= $member['author']['caption'] ?></span>
                        <?php } ?>
                     </div>
                  <?php } ?>
                  <?php if ($member['text']) { ?>
                     <p class="card__content"><?= $member['text'] ?></p>
                  <?php } ?>
               </div>
            <?php endforeach ?>
         </div>
      <?php } ?>
   </div>
</section>