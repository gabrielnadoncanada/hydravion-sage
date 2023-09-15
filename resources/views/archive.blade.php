@extends('layouts.app')

@section('content')
    <div id="dynamic-post"></div>
    <div id="current-post">
        <x-package>
        </x-package>
    </div>

{{--    @while(have_posts())--}}
{{--        @php(the_post())--}}
{{--        <div class="item">--}}
{{--            @includeFirst(['partials.content-' . get_post_type(), 'partials.content'])--}}
{{--        </div>--}}
{{--    @endwhile--}}



{{--        <div class=" grid grid-cols-1 gap-x-4 gap-y-8 xs:grid-cols-2 lg:grid-cols-3 sm:gap-x-6 xl:gap-x-8 max-w-[1536px] py-[100px] w-full px-6 mx-auto">--}}
{{--            @while(have_posts())--}}
{{--                @php(the_post())--}}
{{--                <div class="item">--}}
{{--                    @includeFirst(['partials.content-' . get_post_type(), 'partials.content'])--}}
{{--                </div>--}}
{{--            @endwhile--}}
{{--        </div>--}}


    {{--    <x-package--}}
{{--        :id="$term->term_id"--}}
{{--        :title="$term->name"--}}
{{--        :permalink="$term->slug"--}}
{{--        :content="$term->description ?: ''"--}}
{{--        :featured_image="get_field('featured_image', $term)"--}}
{{--        :video="get_field('featured_video', $term) ?? ''"--}}
{{--        :duration="get_field('duree', $term) ?: ''"--}}
{{--        :length="get_field('temps_de_vol', $term) ?: ''"--}}
{{--        :price="get_field('prix', $term) ?: ''"--}}
{{--        :slides="[]">--}}
{{--    </x-package>--}}

@endsection
