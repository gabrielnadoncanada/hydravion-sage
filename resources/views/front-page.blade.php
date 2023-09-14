@extends('layouts.app')

@section('content')
    <div id="dynamic-post"></div>

    <div id="current-post" x-init="
  if (window.matchMedia('(min-width: 1025px)').matches) {
    setTimeout(() => { sidebarOpen = true; }, 2500);
  }
">
        <div id="hero-section" class="gap-y-8 min-h-screen px-6 py-12  pt-28 flex flex-col justify-start w-full overflow-hidden">
            <div class="hidden top overflow-hidden absolute left-0  pt-28 right-[10%] top-0  h-screen lg:flex flex-col justify-start text-white py-12 z-[3] "
                :class="sidebarOpen ? 'lg:left-[490px]' : ''">
                <img src="{{ get_field('featured_image') }}" alt=""
                    class="z-[1] absolute top-0 h-screen object-cover w-full left-0" />
                @if (get_field('featured_text'))
                    <div class="w-[450px] ml-6 z-[3] text-primary ">
                        {!! get_field('featured_text') !!}
                    </div>
                @endif
            </div>


            <x-video
                class="hidden lg:block"
                src="https://player.vimeo.com/video/830266264?h=db57139e05&amp;badge=0&amp;autopause=0&amp;player_id=0&amp;background=1&amp;muted=1"
                allow="autoplay; fullscreen; picture-in-picture"
                allowfullscreen=""
                data-ready="true">
                <script src="https://player.vimeo.com/api/player.js"></script>
            </x-video>
{{--            <div>--}}
{{--                <div class="vimeo-wrapper">--}}
{{--                    <iframe--}}
{{--                        src="https://player.vimeo.com/video/830266264?h=db57139e05&amp;badge=0&amp;autopause=0&amp;player_id=0&amp;background=1&amp;muted=1"--}}
{{--                        frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen=""--}}
{{--                        data-ready="true"></iframe><br>--}}
{{--                    <script src="https://player.vimeo.com/api/player.js"></script>--}}
{{--                </div>--}}
{{--            </div>--}}

            @if (get_field('featured_text'))
                <div class="max-w-md z-[2] text-white ">
                    {!! get_field('featured_text') !!}
                </div>
            @endif
            <div class="pt-48">
                <x-packages-slider id="front-page"></x-packages-slider>
            </div>

        </div>
        <div class="bg-white text-black">
            {{ the_content() }}
        </div>
    </div>
@endsection
