<?php

define('THEMEROOT', get_bloginfo('template_directory'));
define('IMAGES', THEMEROOT . '/images');
define('SCRIPTS', THEMEROOT . '/js');

if (!function_exists('register_my_menus')) {
   function register_my_menus()
   {
      register_nav_menus(array(
         'header-menu' => 'Header Menu',
         'footer-menu' => 'Footer Menu'

      ));
   }
}
add_action('init', 'register_my_menus');

add_theme_support('custom-logo');
add_theme_support('post-thumbnails');
add_theme_support('align-wide');
add_action('after_setup_theme', function () {
   add_theme_support('pageviews');
});

/*Make ACF Options*/
if (function_exists('acf_add_options_page')) {
   $args = [
      'page_title' => 'Options',
      'menu_title' => 'Options',
   ];
   acf_add_options_page($args);
}
/*End Make ACF Options*/

// Load scripts/styles
add_action('wp_enqueue_scripts', 'load_styles_and_scripts');

// Register scripts
wp_deregister_script('jquery'); // deregisters the default WordPress jQuery
wp_register_script('jquery', SCRIPTS . '/jquery-3.5.0.min.js', array(), false, false);
wp_register_script('slick', SCRIPTS . '/slick.js');
wp_register_script('materialize', SCRIPTS . '/materialize/bin/materialize.min.js');
wp_register_script('macy', SCRIPTS . '/macy.js');
wp_register_script('validate', SCRIPTS . '/jquery.validate.min.js');
wp_register_script('main-scripts', SCRIPTS . '/main.js');
function load_styles_and_scripts()
{
   // Load the stylesheets
   wp_enqueue_style('animate', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css');
   wp_enqueue_style('main-styles', THEMEROOT . '/css/style.css');

   // Load scripts
   wp_enqueue_script('jquery');
   wp_enqueue_script('slick');
   wp_enqueue_script('materialize');
   wp_enqueue_script('validate');
   wp_enqueue_script('main-scripts');

   if (is_home()) {
      wp_enqueue_script('macy');
   }
}
add_action('enqueue_block_editor_assets', 'admin_styles_custom');
function admin_styles_custom()
{
   wp_enqueue_style('animate', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css');
   wp_enqueue_style('main-styles', THEMEROOT . '/css/style.css');

   wp_enqueue_script('jquery');
   wp_enqueue_script('materialize');
   wp_enqueue_script('slick');
   wp_enqueue_script('main-scripts');
}

// Hide content editor
add_action('admin_head', 'hide_editor');
function hide_editor()
{
   $template_file = basename(get_page_template());
   if ($template_file == 'index.php') {
      remove_post_type_support('page', 'editor');
   } elseif ($template_file == 'contacts.php') {
      remove_post_type_support('page', 'editor');
   }
}
// END Hide content editor

/* Video SRC from oEmbed */
function videoSRC($testimonialVideo)
{
   preg_match('/src="(.+?)"/', $testimonialVideo, $matches);
   $src = $matches[1];
   return $src;
}
/* END Video SRC from oEmbed */

/* Portfolio Post type */
add_action('init', 'register_portfolio');
function register_portfolio()
{
   register_post_type('case', [
      'label'  => null,
      'labels' => [
         'name'               => 'Cases', // основное название для типа записи
         'singular_name'      => 'Case', // название для одной записи этого типа
         'add_new'            => 'Add new Case', // для добавления новой записи			
         'menu_name'          => 'Portfolio', // название меню
      ],
      'public'              => true,
      'show_in_menu'        => true, // показывать ли в меню адмнки
      'show_in_rest'        => true, // добавить в REST API. C WP 4.7
      'rest_base'           => null, // $post_type. C WP 4.7
      'menu_position'       => 5,
      'menu_icon'           => 'dashicons-portfolio',
      'supports'            => ['title', 'editor'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
      'taxonomies'          => ['post_tag'],
      'rewrite'             => true,
   ]);
}
/* END Portfolio Post type */

/*--------------------------------------------------*/
/*          Gutunberg block`s
/*--------------------------------------------------*/
//Blocks category
function ams_blocks_cats($default_categories, $post)
{
   return array_merge(
      $default_categories,
      [
         [
            'slug'  => 'ams',
            'title' => 'AMS (brand blocks)',
            'icon'  => null,
         ],
         [
            'slug'  => 'process',
            'title' => 'AMS Process',
            'icon'  => null,
         ]
      ]
   );
}
add_filter('block_categories', 'ams_blocks_cats', 10, 2);

//END blocks category
add_action('acf/init', 'ams_blocks');
function ams_blocks()
{
   // check function exists
   if (function_exists('acf_register_block')) {
      //Hero
      acf_register_block(array(
         'name'            => 'hero',
         'title'            => 'Hero block',
         'description'      => 'Hero block. Top of the homepage',
         'render_callback'   => 'blocks_render_callback',
         'category'         => 'ams',
         'icon'            => 'tagcloud',
         'keywords'         => array('hero', 'home'),
      ));
      //Why us
      acf_register_block(array(
         'name'            => 'why-us',
         'title'            => 'Why us block',
         'description'      => 'Why us block',
         'render_callback'   => 'blocks_render_callback',
         'category'         => 'ams',
         'icon'            => 'universal-access-alt',
         'keywords'         => array('why-us', 'home'),
      ));
      //Columns-cards
      acf_register_block(array(
         'name'            => 'column-cards',
         'title'            => 'Columns cards',
         'description'      => 'Columns cards',
         'render_callback'   => 'blocks_render_callback',
         'category'         => 'ams',
         'icon'            => 'editor-table',
         'keywords'         => array('columns', 'cards'),
      ));
      //Companies logos
      acf_register_block(array(
         'name'            => 'companies-logos',
         'title'            => 'Companies logos',
         'description'      => 'Companies logos',
         'render_callback'   => 'blocks_render_callback',
         'category'         => 'ams',
         'icon'            => 'images-alt',
         'keywords'         => array('companies', 'logos'),
      ));
      //Workflow
      acf_register_block(array(
         'name'            => 'workflow',
         'title'            => 'Workflow section',
         'description'      => 'Workflow section',
         'render_callback'   => 'blocks_render_callback',
         'category'         => 'ams',
         'icon'            => 'image-flip-horizontal',
         'keywords'         => array('workflow'),
      ));
      //Testimonials
      acf_register_block(array(
         'name'            => 'testimonials',
         'title'            => 'Testimonials section',
         'description'      => 'Testimonials section',
         'render_callback'   => 'blocks_render_callback',
         'category'         => 'ams',
         'icon'            => 'format-chat',
         'keywords'         => array('testimonial'),
      ));
      //Trust us
      acf_register_block(array(
         'name'            => 'trust-us',
         'title'            => 'Trust us section',
         'description'      => 'Trust us section',
         'render_callback'   => 'blocks_render_callback',
         'category'         => 'ams',
         'icon'            => 'heart',
         'keywords'         => array('trust us'),
      ));
      //About us
      acf_register_block(array(
         'name'            => 'about-us',
         'title'            => 'About us section',
         'description'      => 'About us section',
         'render_callback'   => 'blocks_render_callback',
         'category'         => 'ams',
         'icon'            => 'groups',
         'keywords'         => array('about us'),
      ));
      //Featured Projects
      acf_register_block(array(
         'name'            => 'featured-projects',
         'title'            => 'Featured Projects section',
         'description'      => 'Featured Projects section',
         'render_callback'   => 'blocks_render_callback',
         'category'         => 'ams',
         'icon'            => 'schedule',
         'keywords'         => array('Featured', 'Projects'),
      ));
      //About us
      acf_register_block(array(
         'name'            => 'call-to-action',
         'title'            => 'Call to action section',
         'description'      => 'Call to action section',
         'render_callback'   => 'blocks_render_callback',
         'category'         => 'ams',
         'icon'            => 'align-left',
         'keywords'         => array('Call to action'),
      ));
      //About us
      acf_register_block(array(
         'name'            => 'hiring',
         'title'            => 'AMS Hiring',
         'description'      => 'Careers page top section',
         'render_callback'   => 'blocks_render_callback',
         'category'         => 'ams',
         'icon'            => 'admin-users',
         'keywords'         => array('accordion'),
      ));
      //Contacts page heading
      acf_register_block(array(
         'name'            => 'contacts-page-heading',
         'title'            => 'Contacts page heading',
         'description'      => 'Contacts page heading',
         'render_callback'   => 'blocks_render_callback',
         'category'         => 'ams',
         'icon'            => 'media-code',
         'keywords'         => array('heading'),
      ));
      //Portfolio page heading
      acf_register_block(array(
         'name'            => 'portfolio-page-heading',
         'title'            => 'Portfolio page heading',
         'description'      => 'Portfolio page heading',
         'render_callback'   => 'blocks_render_callback',
         'category'         => 'ams',
         'icon'            => 'media-code',
         'keywords'         => array('heading'),
      ));
      //Stores buttons
      acf_register_block(array(
         'name'            => 'app-images',
         'title'            => 'Brand app images',
         'description'      => 'Brand app images',
         'render_callback'   => 'blocks_render_callback',
         'category'         => 'ams',
         'icon'            => 'images-alt2',
         'keywords'         => array('images'),
         'post_types' => array('case', 'post'),
      ));
      //Stores buttons
      acf_register_block(array(
         'name'            => 'stores-buttons',
         'title'            => 'Stores buttons',
         'description'      => 'App store and Play market buttons',
         'render_callback'   => 'blocks_render_callback',
         'category'         => 'ams',
         'icon'            => 'share',
         'keywords'         => array('ap store', 'play market'),
         'post_types' => array('case'),
      ));
      //Stores textimonials
      acf_register_block(array(
         'name'            => 'stores-testimonials',
         'title'            => 'Stores testimonials',
         'description'      => 'App store and Play market testimonials',
         'render_callback'   => 'blocks_render_callback',
         'category'         => 'ams',
         'icon'            => 'format-chat',
         'keywords'         => array('ap store', 'play market'),
         'post_types' => array('case'),
      ));
      //Single case testimonial
      acf_register_block(array(
         'name'            => 'case-testimonial',
         'title'            => 'Main Case testimonial',
         'description'      => 'Case testimonial',
         'render_callback'   => 'blocks_render_callback',
         'category'         => 'ams',
         'icon'            => 'format-chat',
         'keywords'         => array('testimonial'),
      ));
      //Process block
      acf_register_block(array(
         'name'            => 'process',
         'title'            => 'Process block',
         'description'      => 'Process variable block',
         'render_callback'   => 'blocks_render_callback',
         'category'         => 'process',
         'icon'            => 'welcome-widgets-menus',
         'keywords'         => array('process'),
         'post_types' => array('page'),
      ));
      //Author block
      acf_register_block(array(
         'name'            => 'ams-author',
         'title'            => 'AMS Author block',
         'description'      => 'AMS Author block',
         'render_callback'   => 'blocks_render_callback',
         'category'         => 'ams',
         'icon'            => 'businessman',
         'keywords'         => array('author'),
         'post_types' => array('post', 'case'),
      ));
      //Most viewed
      acf_register_block(array(
         'name'            => 'most-viewed',
         'title'            => 'Most viewed posts',
         'description'      => 'Most viewed posts block',
         'render_callback'   => 'blocks_render_callback',
         'category'         => 'ams',
         'icon'            => 'visibility',
         'keywords'         => array('most viewed'),
         'post_types' => array('post'),
      ));
   }
}

function blocks_render_callback($block)
{
   // convert name ("acf/testimonial") into path friendly slug ("testimonial")
   $slug = str_replace('acf/', '', $block['name']);

   // include a template part from within the "template-parts/block" folder
   if (file_exists(get_theme_file_path("/template-parts/blocks/{$slug}.php"))) {
      include(get_theme_file_path("/template-parts/blocks/{$slug}.php"));
   }
}

// Contact Form 7 remove auto added p tags
add_filter('wpcf7_autop_or_not', '__return_false');

add_filter('wpcf7_form_elements', function ($content) {
   $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);

   return $content;
});
