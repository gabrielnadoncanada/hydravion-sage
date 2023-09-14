<div class="bg-white ">
    <div class="px-6">
        @php

            $myquery = new WP_Query(array(
                'post_type' => get_post_type(), // Use the post type retrieved
                'posts_per_page' => 3, // Only get the last post
                'order' => 'DESC', // Get posts in descending order (latest first)
                'orderby' => 'date' // Order by date
            )); // Query the posts
        @endphp

        <div class="my-20"><h2 class="text-center my-12 text-4xl text-primary">Articles récents</h2>
            <div
                class="grid grid-cols-1 gap-x-4 gap-y-8 xs:grid-cols-2 lg:grid-cols-3 sm:gap-x-6 xl:gap-x-8 max-w-[1536px]  w-full mx-auto">
                @foreach($myquery->get_posts() as $post)
                    @includeFirst(['partials.content-' . get_post_type(), 'partials.content'])
                @endforeach
            </div>
        </div>

    </div>

    <div  style="border-top-color:#eaeaea;border-top-width:1px" class="px-6">
        @php
            the_post_navigation(array(
                   'prev_text' => '<span class="nav-subtitle">' . esc_html__('←', 'hc') . '</span> <span class="nav-title">%title</span>',
                   'next_text' => '<span class="nav-subtitle">' . esc_html__('→', 'hc') . '</span> <span class="nav-title">%title</span>',
            ));

           wp_reset_postdata();
        @endphp
    </div>

</div>
