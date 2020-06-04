<?php /* Template name: Portfolio page */
get_header();
the_post();
$currentID = get_the_id(); ?>
<div class="container">
    <?php the_content() ?>
</div>
<?php get_template_part('template-parts/portfolio-main-cases'); ?>
<?php get_template_part('template-parts/portfolio-all-cases'); ?>

<?php get_template_part('template-parts/ideas'); ?>

<?php get_footer();
