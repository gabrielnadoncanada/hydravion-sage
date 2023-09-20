<div>
    <div class="min-h-screen pt-[100px] px-6 pb-12 relative  flex flex-col justify-end">
        <img
            src="{{ $featured_image }}"
            class="z-[1] absolute top-0 h-full object-cover w-full right-0"
            alt=""
        />
        <div aria-hidden="true" class="absolute inset-0 z-[1] bg-gradient-b-to-t "></div>

        @if($video)
            <div class="video-wrapper z-[1]">
                <iframe
                    src="https://player.vimeo.com/video/{{$video}}?h=db57139e05&badge=0&autopause=0&player_id=0&background=1&muted=1"
                    frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
                <br/>
            </div>
        @endif
        <div class="max-w-[490px] z-[2]">
            <div class=" z-[2] mb-7 ">
                <x-text as="h1" theme="h1" class="mb-5 font-normal">{!! $title !!} </x-text>
            </div>

            @if($duration || $length || $price || $address)
                <ul class="mb-6 ">
                    @if($address)
                        <li class="mb-3 inline-flex py-2 px-5 flex-col text-lg font-semibold bg-primary/80 justify-center border border-white rounded-lg mr-3">
                            <span class="text-xs">Adresse</span>{{ $address }}
                        </li>
                    @endif
                    @if($duration)
                        <li class="mb-3 inline-flex py-2 px-5 flex-col text-lg font-semibold bg-primary/80 justify-center border border-white rounded-lg mr-3">
                            <span class="text-xs">Durée</span>{{ $duration }}
                        </li>
                    @endif
                    @if($length)
                        <li class="mb-3 inline-flex py-2 px-4 flex-col text-lg font-semibold justify-center bg-primary/80 border border-white rounded-lg mr-3">
                            <span class="text-xs">Temps de vol</span>{{ $length }}
                        </li>
                    @endif
                    @if($price)
                        <li class="mb-3 inline-flex py-2 px-4 flex-col text-lg font-semibold bg-foreground-light/80 justify-center border border-white rounded-lg mr-3">
                            <span class="text-xs">Prix&nbsp;/&nbsp;personne</span>{{ $price }}$
                        </li>
                    @endif

                </ul>
            @endif
            {!! $description !!}
        </div>
        <div class="relative px-6 -bottom-[3rem] {{ $slides && count($slides) ? 'pb-[250px]' : 'pb-[75px]' }}">
            @if($slides && count($slides))
                <x-packages-slider :packages="$slides"></x-packages-slider>
            @endif
        </div>
    </div>

    <div class="bg-white text-black relative h-screen">
        @if($content)
            <div class="max-w-[1536px] mx-auto px-6 py-10 lg:py-20">
                <div class="content typography is-layout-constrained">
                    {!! $content !!}
                </div>
            </div>
        @endif
        @if($leaflet_map)
            <x-map></x-map>
{{--            <x-leaflet-map show="{{is_single() ? 'true' : 'window.leafletmap'}}"></x-leaflet-map>--}}
        @endif
    </div>
</div>
