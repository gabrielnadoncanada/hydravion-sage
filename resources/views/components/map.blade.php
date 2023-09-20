@props(['title' => false])
<div class="">
    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.45.0/mapbox-gl.js'></script>
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.45.0/mapbox-gl.css' rel='stylesheet'/>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBTZ0tCGFf3iUp428zAvu5VZSM3JhddK5s"></script>
    <div id="wrapper">
        <div id='map2'></div>
        <div id="card" class="map-card" data-scene-number="0">
            @if($title)
                <div id="card_title" class="map-card__title">
                    <h1>{{$title}}</h1>
                </div>
            @endif
            <div id="card_body" class="map-card__body"></div>
            <div id="card_nav" class="map-card__nav map-card__nav_cover"><span id="card_nav__prev"></span><span
                    id="card_nav__next">Suivant &rarr;</span></div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
    <?php
    wp_enqueue_style('mapbox', get_template_directory_uri() . '/resources/styles/mapbox.css', array(), null);

    ?>
</div>
