<?php
$copyright = get_field('footer_copyright_section', 'options');
$footer_nav = get_field('footer_nav_section', 'options');
$footer_contacts = get_field('footer_contacts', 'options');
$reviews = get_field('reviews_section', 'options');
?>
<footer class="section">
   <div class="container flex">
      <?php if ($copyright) { ?>
         <div class="copyright">
            <?php if ($copyright['title']) { ?>
               <h5><?= $copyright['title'] ?></h5>
            <?php } ?>
            <?php if ($copyright['text']) { ?>
               <p><?= $copyright['text'] ?></p>
            <?php } ?>
            <?php if ($copyright['socials']) { ?>
               <div class="social">
                  <?php foreach ($copyright['socials'] as $social) { ?>
                     <a href="<?= $social['link'] ?>" target="_blanc"><img src="<?= $social['icon']['sizes']['medium'] ?>"></a>
                  <?php } ?>
               </div>
            <?php } ?>
         </div>
      <?php } ?>
      <div class="footer-nav">
         <?php if ($footer_nav['title']) { ?>
            <h5><?= $footer_nav['title'] ?></h5>
         <?php } ?>
         <?php
         wp_nav_menu([
            'theme_location'  => 'footer-menu',
            'container'       => 'nav',
         ]); ?>
      </div>
      <?php if ($footer_contacts) { ?>
         <div class="footer-contacts">
            <?php if ($footer_contacts['title']) { ?>
               <h5><?= $footer_contacts['title'] ?></h5>
            <?php } ?>
            <?php if ($footer_contacts['content']) { ?>
               <div class="wysiwyg-styles"><?= $footer_contacts['content'] ?></div>
            <?php } ?>
         </div>
      <?php } ?>
      <?php if ($reviews) { ?>
         <div class="reviews">
            <?php foreach ($reviews as $review) { ?>
               <a href="<?= $review['link'] ?>"><img src="<?= $review['image']['sizes']['medium_large'] ?>"></a>
            <?php } ?>
         </div>
      <?php } ?>
   </div>
</footer>
<?php wp_footer() ?>
</body>

</html>