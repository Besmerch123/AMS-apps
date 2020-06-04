<?php get_header();

$currentID = get_option('page_for_posts');

?>
<div class="container">
   <div class="blog-page">
      <h1 class="blog-page__title">Latest Updates</h1>
      <div class="progress" style="margin-top: 50px;">
         <div class="indeterminate"></div>
      </div>
      <div class="posts" style="opacity: 0;">
         <?php foreach ($posts as $post) :
            $post_id = get_the_id();
            $postImage = get_the_post_thumbnail_url($post, 'large');
            $postCats = wp_get_post_terms($post_id, 'category', ['fields' => 'names']); ?>
            <a href="<?= get_the_permalink() ?>" class="post">
               <div class="post__image-wrap">
                  <img src="<?= $postImage ?>">
                  <div class="category-badges">
                     <?php foreach ($postCats as $cat) : ?>
                        <div class="category-badge">
                           <?= $cat ?>
                        </div>
                     <?php endforeach ?>
                  </div>
               </div>
               <div class="post__caption">
                  <h2 class="post__title"><?= get_the_title() ?></h2>
                  <p class="post__excerpt text-darker"><?= get_the_excerpt() ?></p>
               </div>
            </a>
         <?php endforeach; ?>
      </div>
   </div>
</div>
<?php include(locate_template('template-parts/ideas.php')); ?>

<script>
   jQuery(document).ready(function() {
      // Masonry
      var macyInstance = Macy({
         container: '.posts',
         columns: 3,
         trueOrder: true,
         waitForImages: false,
         margin: 55,
         breakAt: {
            992: {
               columns: 2
            },
            575: {
               columns: 1
            }
         },
      });
      macyInstance.on(macyInstance.constants.EVENT_IMAGE_COMPLETE, function() {
         $('.progress').hide('slow');
         $('.posts').css({
            "opacity": "1"
         });
      });
      // END Masonry
   })
</script>
<?php get_footer(); ?>