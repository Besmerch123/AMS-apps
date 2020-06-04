<div class="container cases">
   <?php if (!empty($sectionTitle)) : ?>
      <h2 class="section-title"><?= $sectionTitle ?></h2>
   <?php endif ?>
   <?php if (!empty($sectionSubtitle)) : ?>
      <p class="section-subtitle"><?= $sectionSubtitle ?></p>
   <?php endif ?>
   <?php if (!empty($sectionBtn)) : ?>
      <a href="<?= $sectionBtn['link_to'] ?>" class="brand-btn btn-transparent waves-effect waves-teal"><?= $sectionBtn['text'] ?></a>
   <?php endif ?>

   <!-- <div class="cases-wrap">
      <div class="case">
         <div class="card"></div>
      </div>
   </div> -->

</div>