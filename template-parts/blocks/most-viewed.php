<?php

/**
 * Block Name: Most viewed posts
 *
 * This is the template that displays the Most viewed posts block.
 */
$most_viewed = new WP_Query(array(
   'post_type'         => 'post',
   'posts_per_page'    => 4,
   'orderby'           => 'meta_value_num',
   'order'             => 'desc',
   'meta_key'          => 'views',
));
if ($most_viewed->have_posts()) {
   $the_most_viewed = [];
   while ($most_viewed->have_posts()) {
      $most_viewed->the_post();
      $curentID = get_the_id();
      $title = get_the_title();
      $image = get_the_post_thumbnail_url($curentID, 'medium');
      $cat = wp_get_post_terms($curentID, 'category', ['fields' => 'names']);
      $link = get_the_permalink();
      $the_most_viewed[$curentID] = [
         'title'  => $title,
         'image'  => $image,
         'cats'    => $cat,
         'link'   => $link
      ];
   }
}
?>
<div class="container">
   <div class="posts most-viewed">
      <?php foreach ($the_most_viewed as $post) : ?>
         <a href="<?= $post['link'] ?>" class="post">
            <div class="post__image-wrap">
               <img src="<?= $post['image'] ?>">
               <div class="category-badges">
                  <?php foreach ($post['cats'] as $cat) : ?>
                     <div class="category-badge">
                        <?= $cat ?>
                     </div>
                  <?php endforeach ?>
               </div>
            </div>
            <div class="post__caption">
               <h2 class="post__title"><?= $post['title'] ?></h2>
            </div>
         </a>
      <?php endforeach; ?>
   </div>
</div>