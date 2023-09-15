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
            'featured_image' => $this->get_featured_image(),
            'title' => $this->get_title(),
            'description' => $this->get_description(),
            'duration' => $this->get_duration(),
            'length' => $this->get_length(),
            'price' => $this->get_price(),
            'content' => is_archive() ? false : get_the_content(),
            'video' =>$this->get_video(),
            'slides' => is_single() ? [] : $this->get_slides(),
            'leaflet_map' => is_archive() ? false : get_field('leaflet_map'),
        ];
    }

    public function get_video()
    {
        $obj = is_archive() ? get_queried_object() : null;

        return get_field('featured_video', $obj);
    }

    public function get_duration()
    {
        $obj = is_archive() ? get_queried_object() : null;

        return get_field('duree', $obj);
    }

    public function get_length()
    {
        $obj = is_archive() ? get_queried_object() : null;

        return get_field('temps_de_vol', $obj);
    }

    public function get_price()
    {
        $obj = is_archive() ? get_queried_object() : null;

        return get_field('prix', $obj);
    }

    public function get_title()
    {
        $obj = is_archive() ? get_queried_object() : null;

        return $obj ? $obj->name : get_the_title();
    }

    public function get_description()
    {
        $obj = is_archive() ? get_queried_object() : null;

        $description = get_field('featured_text', $obj);

        if ($description) {
            return $description;
        }

        return $obj ? $obj->description : get_the_excerpt();
    }

    public function get_featured_image()
    {
        $obj = is_archive() ? get_queried_object() : null;

        $image = get_field('featured_image', $obj);

        if (!$image) {
            $image = get_the_post_thumbnail_url();

            if (!$image) {
                $image = get_default_image_placeholder();
            }
        }

        return $image;
    }


    public function get_slides()
    {
        $slides = [];
        global $wp_query;

        foreach ($wp_query->get_posts() as $key => $post){
            $slides[] = [
                'title' => $post->post_title,
                'content' => $post->post_content,
                'featured_image' => get_the_post_thumbnail_url($post->ID),
                'permalink' => get_permalink($post->ID),
            ];
        }

        return $slides;

    }
}
