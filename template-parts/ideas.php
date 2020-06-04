<?php //Vars

$show = get_field('show_section', $currentID);
$title = get_field('section_title', $currentID);
$content = get_field('section_text', $currentID);
$button = get_field('button', $currentID);
$image = get_field('ideas_image', $currentID);

?>
<?php if ($show == true) : ?>
   <section class="ideas active-bg cta">
      <?php if ($image) : ?>
         <img src="<?= $image['sizes']['2048x2048'] ?>" class="ideas__image">
      <?php endif ?>
      <div class="container">
         <?php if ($title || $content || $button) { ?>
            <div class="cta__content">
               <?php if ($title) { ?>
                  <h3 class="cta__title"><?= $title ?></h3>
               <?php } ?>
               <?php if ($content) { ?>
                  <p class="cta__text"><?= $content ?></p>
               <?php } ?>
               <?php if ($button['text'] && $button['link']) { ?>
                  <a href="<?= $button['link'] ?>" class="brand-btn btn-transparent waves-effect waves-teal"><?= $button['text'] ?></a>
               <?php } ?>
            </div>
         <?php } ?>
      </div>
   </section>
<?php endif ?>