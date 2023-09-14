<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use WP_Query;

class Package extends Composer
{
    /**
     * List of views served by this composer.
     */
    protected static $views = [
        'components.package',
    ];

    /**
     * Returns the data for the view.
     *
     * @return array
     */
    public function with()
    {
        return [
            'featured_image' => get_field('featured_image') ? get_field('featured_image') : get_the_post_thumbnail_url(),
            'title' => get_the_title(),
            'excerpt' => get_the_excerpt(),
            'duration' => get_field('duree'),
            'length' => get_field('temps_de_vol'),
            'price' => get_field('prix'),
            'content' => get_the_content(),
            'video' => get_field('featured_video'),
            'slides' => $this->data->get('slides') ?? [],
            'leaflet_map' => get_field('leaflet_map'),
        ];
    }
}
