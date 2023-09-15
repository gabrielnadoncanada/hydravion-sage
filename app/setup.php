<?php


/**
 * Theme setup.
 */

namespace App;

/**
 * Register the theme assets.
 *
 * @return void
 */
add_action('wp_enqueue_scripts', function (): void {
    /**
     * Cleanup styles
     */
//    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');


}, 100);


/**
 * Register the initial theme setup.
 *
 * @return void
 */
add_action('after_setup_theme', function (): void {
    /**
     * Enable features from the Soil plugin if activated.
     *
     * @link https://roots.io/plugins/soil/
     */
    add_theme_support('soil', [
        'clean-up',
        'nav-walker',
        'nice-search',
        'relative-urls'
    ]);

    /**
     * Disable full-site editing support.
     *
     * @link https://wptavern.com/gutenberg-10-5-embeds-pdfs-adds-verse-block-color-options-and-introduces-new-patterns
     */
    remove_theme_support('block-templates');

    /**
     * Register the navigation menus.
     *
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
    register_nav_menus([
        'primary_navigation' => __('Primary Navigation', 'sage'),
        'mobile_navigation' => __('Mobile Navigation', 'sage'),
        'footer_navigation' => __('Footer Navigation', 'sage'),
    ]);

    /**
     * Disable the default block patterns.
     *
     * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#disabling-the-default-block-patterns
     */
    remove_theme_support('core-block-patterns');

    /**
     * Enable plugins to manage the document title.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');

    /**
     * Enable post thumbnail support.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    /**
     * Enable responsive embed support.
     *
     * @link https://wordpress.org/gutenberg/handbook/designers-developers/developers/themes/theme-support/#responsive-embedded-content
     */
    add_theme_support('responsive-embeds');

    /**
     * Enable HTML5 markup support.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', [
        'caption',
        'comment-form',
        'comment-list',
        'gallery',
        'search-form',
        'script',
        'style'
    ]);

    /**
     * Enable selective refresh for widgets in customizer.
     *
     * @link https://developer.wordpress.org/themes/advanced-topics/customizer-api/#theme-support-in-sidebars
     */
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Register custom image sizes
     *
     * @see app/medias.php
     */
    set_image_sizes();
}, 20);

/**
 * Register the theme sidebars.
 *
 * @return void
 */
add_action('widgets_init', function () {
    $config = [
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ];

    register_sidebar([
            'name' => __('Primary', 'sage'),
            'id' => 'sidebar-primary'
        ] + $config);

    register_sidebar([
            'name' => __('Footer', 'sage'),
            'id' => 'sidebar-footer'
        ] + $config);
});

/**
 * Overrides
 */
add_action('init', function () {
    /**
     * Cleanup global styles
     *
     * @link https://github.com/WordPress/gutenberg/issues/36834
     */
    remove_action('wp_enqueue_scripts', 'wp_enqueue_global_styles');
    remove_action('wp_body_open', 'wp_global_styles_render_svg_filters');
    remove_action('wp_footer', 'wp_enqueue_global_styles', 1);

    /**
     * Cleanup media formats
     */
    reset_image_sizes();
});


add_action('wp_enqueue_scripts', function () {
    wp_enqueue_script('magnetic', get_stylesheet_directory_uri() . '/resources/scripts/magnetic.js', array('jquery'), time(), true);
    wp_enqueue_script('alpine', get_stylesheet_directory_uri() . '/resources/scripts/alpine.min.js', array(), time(), true);
    wp_enqueue_script('gsap', get_stylesheet_directory_uri() . '/resources/scripts/gsap.min.js', array(), time(), true);
    wp_enqueue_script('scripts', get_stylesheet_directory_uri() . '/resources/scripts/scripts.js', array('jquery', 'underscore', 'swiper'), time(), true);
    wp_enqueue_script('isotope', get_stylesheet_directory_uri() . '/resources/scripts/isotope.pkgd.min.js', array(), time(), true);
    wp_enqueue_script('isotope-packery', get_stylesheet_directory_uri() . '/resources/scripts/isotope-packery.js', array('isotope'), time(), true);
    wp_enqueue_script('masonry-grid', get_stylesheet_directory_uri() . '/resources/scripts/masonry.js', array('isotope-packery'), time(), true);
    wp_enqueue_script('swiper', get_stylesheet_directory_uri() . '/resources/scripts/swiper-bundle.js', array(), null, true);
    wp_enqueue_style('swiper', get_stylesheet_directory_uri() . '/resources/styles/swiper-bundle.css', array(), null);
});

add_action('init', function () {
    global $wp_rewrite;
    $region_terms = get_terms(array(
        'taxonomy' => 'package_region',
        'hide_empty' => false,
    ));

    if ($region_terms && !is_wp_error($region_terms)) {
        foreach ($region_terms as $term) {
            $slug = $term->slug;
            add_rewrite_rule("^$slug/survols/([^/]+)/?$", 'index.php?package_group=$matches[1]&package_region_term=' . $slug, 'top');
            add_rewrite_rule("^$slug/([^/]+)/?$", 'index.php?package_type=$matches[1]&package_region_term=' . $slug, 'top');
            add_rewrite_rule("^$slug/?$", 'index.php?package_region=' . $slug, 'top');
        }
    }
}, 11);


