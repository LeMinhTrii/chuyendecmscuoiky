<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package JobScout
 */
/**
 * Doctype Hook
 * 
 * @hooked jobscout_doctype
 */
do_action('jobscout_doctype');
?>

<head itemscope itemtype="https://schema.org/WebSite">
    <?php
    /**
     * Before wp_head
     * 
     * @hooked jobscout_head
     */
    do_action('jobscout_before_wp_head');

    wp_head(); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/build/style-editor-customizer.css" media="all">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,700,800|Open+Sans+Condensed:300,700|Prata&subset=vietnamese' rel='stylesheet' type='text/css'>
</head>

<body <?php body_class(); ?> itemscope itemtype="https://schema.org/WebPage">

    <?php
    wp_body_open();

    /**
     * Before Header
     * @hooked jobscout_responsive_header - 15
     * @hooked jobscout_page_start - 20 
     */
    do_action('jobscout_before_header');

    /**
     * Header
     * 
     * @hooked jobscout_header - 20     
     */
    do_action('jobscout_header');

    /**
     * Content
     * 
     * @hooked jobscout_breadcrumbs_bar
     */
    do_action('jobscout_after_header');


    /**
     * Content
     * 
     * @hooked jobscout_content_start
     */
    if (!is_page('about-us')) {
        if (!is_page('contact')) {
            if (!is_page('blog')) {
                do_action('jobscout_content');
            }
        }
    }
