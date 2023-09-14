<?php

$url = '/wp-content/plugins/acf-leaflet-field/assets/';
$version = time();

wp_enqueue_style('leaflet', 'https://unpkg.com/leaflet/dist/leaflet.css', array(), $version);
wp_enqueue_style('leaflet-rain', 'https://cdn.jsdelivr.net/gh/mwasil/Leaflet.Rainviewer/leaflet.rainviewer.css', array(), $version);
wp_enqueue_style('font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css', array(), $version);
wp_enqueue_style('acf-leaflet-front', get_template_directory_uri() . '/assets/css/leaflet.css', array(), $version);
wp_enqueue_script('acf-leaflet', "https://unpkg.com/leaflet@1.9.4/dist/leaflet.js", array(), $version, true);
wp_enqueue_script('acf-rain', "https://cdn.jsdelivr.net/gh/mwasil/Leaflet.Rainviewer/leaflet.rainviewer.js", array(), $version, true);
wp_register_script('acf-leaflet-front', "{$url}js/leaflet-front.js", array(), $version, true);
wp_localize_script('acf-leaflet-front', 'leaflet_map_data', get_field('leaflet_map'));
wp_enqueue_script('acf-leaflet-front');

?>

<div id="leaflet-container" class="mt-12">
	<div id="map" style="height:750px"></div>
	<div class="leaflet-modal">
		<div class="leaflet-modal-content">
			<span class="close">&times;</span>
			<div class="leaflet-modal-sidebar">
				<p>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias ex, incidunt ipsam laudantium necessitatibus
					non numquam quam voluptas voluptatibus! Ad explicabo hic laborum quo tempora! Ab laboriosam quam recusandae vitae!
				</p>
			</div>
			<div class="wp-block-custom-slider">
				<div id="image-gallery" class="slider-carousel-container swiper swiper-horizontal"
				     data-desktop="1"
				     data-tablet="1"
				     data-mobile="1"
				     data-autoplay="false"
				     data-autoplaydelay="0"
				     data-autoplaydirection="false"
				     data-speed="150"
				     data-loop="true"
				     data-pauseonhover="false"
				     data-keyboard="true"
				     data-mousewheel="false"
				     data-autoheight="false"
				     data-deskspace="32"
				     data-tabspace="16"
				     data-phonespace="16"
				     data-id="image-gallery"
				     data-pagination="true"
				     data-navigation="true">
					<div class="swiper-wrapper"></div>
				</div>
				<div class="swiper-pagination"></div>
			</div>
		</div>
	</div>
</div>

