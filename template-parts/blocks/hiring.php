<?php

/**
 * Block Name: Case testimonial
 *
 * This is the template that displays the Case testimonial block.
 */
$hiring_title = get_field('hiring_title');
$hiring_subtitle = get_field('hiring_subtitle');
$vacancys = get_field('vacancys');
?>
<section class="hiring brand-bg section">
   <div class="container">
      <?php if ($hiring_title != '') : ?>
         <h2 class="section-title"><?= $hiring_title ?></h2>
      <?php endif ?>
      <?php if ($hiring_subtitle != '') : ?>
         <p class="section-subtitle"><?= $hiring_subtitle ?></p>
      <?php endif ?>
      <?php if (!empty($vacancys)) : ?>
         <div class="vacancys">
            <ul class="collapsible">
               <?php foreach ($vacancys as $vacancy) : ?>
                  <li class="vacancy">
                     <div class="collapsible-header">
                        <h3 class="vacancy__title"><?= $vacancy['title'] ?></h3>
                        <span class="vacancy__level text-darker"><?= $vacancy['level'] ?></span>
                        <svg class="pointer" width="16" height="10" viewBox="0 0 16 10" xmlns="http://www.w3.org/2000/svg">
                           <path fill-rule="evenodd" clip-rule="evenodd" d="M2 0L8 6L14 0L16 2L8 10L0 2L2 0Z" />
                        </svg>

                     </div>
                     <div class="collapsible-body">
                        <?= apply_filters('the_content', $vacancy['content']) ?>
                     </div>
                  </li>
               <?php endforeach ?>
            </ul>
         </div>
      <?php endif ?>
   </div>
</section>