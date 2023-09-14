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
        'primary_navigation' => __('Primary Navigation', 'sage')
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
    $url = '/wp-content/plugins/acf-leaflet-field/assets/';
    $version = time();

    $leafletData = get_field('leaflet_map');



    wp_enqueue_style('leaflet', 'https://unpkg.com/leaflet/dist/leaflet.css', array(), $version);
    wp_enqueue_style('leaflet-rain', 'https://cdn.jsdelivr.net/gh/mwasil/Leaflet.Rainviewer/leaflet.rainviewer.css', array(), $version);
    wp_enqueue_style('font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css', array(), $version);
    wp_enqueue_style('acf-leaflet-front', get_template_directory_uri() . '/resources/styles/leaflet.css', array(), $version);
    wp_enqueue_script('acf-leaflet', "https://unpkg.com/leaflet@1.9.4/dist/leaflet.js", array(), $version, true);
    wp_enqueue_script('acf-rain', "https://cdn.jsdelivr.net/gh/mwasil/Leaflet.Rainviewer/leaflet.rainviewer.js", array(), $version, true);
    wp_register_script('acf-leaflet-front', "{$url}js/leaflet-front.js", array(), $version, true);
    wp_localize_script('acf-leaflet-front', 'leaflet_map_data', $leafletData);
    wp_enqueue_script('acf-leaflet-front');
});


// For logged-in users
add_action('wp_ajax_my_action', function () {




    echo view('components.package', $_POST["item"])->render();
    die();
});

// For non logged-in users
add_action('wp_ajax_nopriv_my_action', function () {
    dd('gay');
});
