<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head() ?>
</head>
<?php $template_file = basename(get_page_template());
$logo_white = get_field('white_logo', 'options');
$custom_logo__url = wp_get_attachment_image_url(get_theme_mod('custom_logo'), 'full'); ?>

<body class="<?php if (is_admin_bar_showing() == true) {
                    echo 'body-with-admin-bar';
                };
                if (is_admin() == false) {
                    echo ' front';
                } ?>">
    <header class="header <?php if ($template_file == 'portfolio.php') : echo ('header-transparent');
                            endif ?>">
        <div class="container">
            <a href="#" data-target="mobile-menu" class="sidenav-trigger burger">
                <span></span>
                <span></span>
                <span></span>
            </a>
            <?php
            if ($custom_logo__url) { ?>
                <a href="<?= get_home_url() ?>" class="header__logo">
                    <?php if ($template_file == 'portfolio.php') : ?>
                        <img src="<?= $logo_white['sizes']['large'] ?>">
                    <?php else : ?>
                        <img src="<?= $custom_logo__url ?>">
                    <?php endif ?>
                </a>
            <?php } ?>
            <nav class="header__menu">
                <?php wp_nav_menu([
                    'theme_location'  => 'header-menu',
                    'container'       => false,
                    'menu_class'      => '',
                ]); ?>
                <?php $contact_us = get_field('header_contact_us_button', 'options');
                if ($contact_us) { ?>
                    <a href="<?= $contact_us['link_to'] ?>" class="brand-btn btn-transparent waves-effect waves-teal"><?= $contact_us['text'] ?></a>
                <?php } ?>
            </nav>
        </div>
    </header>
    <?php wp_nav_menu([
        'theme_location'  => 'header-menu',
        'container'       => 'nav',
        'container_class' => 'sidenav',
        'container_id'    => 'mobile-menu',
        'menu_class'      => '',
    ]);
    ?>