<?php

/*
 * Copyright (c) 2023 яαvoroηα
 *
 *  Permission is hereby granted, free of charge, to any person obtaining a copy of
 *  this software and associated documentation files (the "Software"), to deal in
 *  the Software without restriction, including without limitation the rights to
 *  use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of
 *  the Software, and to permit persons to whom the Software is furnished to do so,
 *  subject to the following conditions:
 *
 *  The above copyright notice and this permission notice shall be included in all
 *  copies or substantial portions of the Software.
 *
 *  THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 *  IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS
 *  FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
 *  COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER
 *  IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN
 *  CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */

/**
 * Theme filters.
 */

namespace App;

/**
 * Add "… Continued" to the excerpt.
 *
 * @return string
 */
add_filter('excerpt_more', function (): string {
    return sprintf(' &hellip; <a href="%s">%s</a>', get_permalink(), __('Continued', 'sage'));
});

/**
 * Load scripts asset as module
 *
 * @return string
 */
add_filter('script_loader_tag', function ($tag, $handle, $src): string {
    $namespace = strtolower(wp_get_theme()->get('Name'));

    if ($namespace !== $handle) {
        return $tag;
    }

    $tag = '<script type="module" src="' . esc_url($src) . '"></script>';

    return $tag;
}, 10, 3);


add_filter('upload_mimes', function ($mimes) {
    $mimes['kml'] = 'text/xml';
    $mimes['kmz'] = 'application/zip';
    return $mimes;
});


add_filter('query_vars', function ($vars) {
    $vars[] = 'package_region_term';
    return $vars;
});

add_filter('term_link', function ($link, $term, $taxonomy) {
    $custom_taxonomies = array('package_region', 'package_type', 'package_group');
    if (in_array($taxonomy, $custom_taxonomies)) {
        return home_url('/') . $term->slug;
    }
    return $link;
}, 10, 3);



add_filter('gform_field_value_package_group', function ($value) {
    $term_slug = isset($_GET['package_group']) ? sanitize_text_field($_GET['package_group']) : '';

    if (!empty($term_slug)) {
        $term = get_term_by('slug', $term_slug, 'package_group');
        if ($term && !is_wp_error($term)) {
            return $term->term_id;
        }
    }
    return $value;
});


add_filter('gform_field_value_package_region', function ($value) {
    $term_slug = isset($_GET['package_region']) ? sanitize_text_field($_GET['package_region']) : '';

    if (!empty($term_slug)) {
        $term = get_term_by('slug', $term_slug, 'package_region');
        if ($term && !is_wp_error($term)) {
            return $term->term_id;
        }
    }
    return $value;
});


add_filter('gform_field_value_package_type', function ($value) {
    $term_slug = isset($_GET['package_type']) ? sanitize_text_field($_GET['package_type']) : '';

    if (!empty($term_slug)) {
        $term = get_term_by('slug', $term_slug, 'package_type');
        if ($term && !is_wp_error($term)) {
            return $term->term_id;
        }
    }
    return $value;
});
