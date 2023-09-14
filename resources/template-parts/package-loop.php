<div class="slider-carousel-container  z-[4] swiper swiper-container-free-mode absolute  bottom-[3rem] right-[0] left-[0] max-h-[205px]"
     id="packages-slides"
>
	<div class="swiper-wrapper" style="transition-timing-function : linear;">
		<?php foreach ($args["posts"] as $key => $post): ?>
			<div class="wp-block-custom-slide swiper-slide w-full max-w-[390px]">
				<div class="shadow-lg magnetic group aspect-h-1 aspect-w-[1.91] block w-full overflow-hidden rounded-lg focus-within:ring-2 focus-within:ring-secondary-500 focus-within:ring-offset-2 focus-within:ring-offset-gray-100">
					<?php if ($post["featured_image"] !== ""): ?>
						<img src="<?= $post["featured_image"] ?>" alt="" class="object-cover">
					<?php endif; ?>
					<?php if ($post["title"] !== ""): ?>
						<h2 class="max-w-[75%] leading-6 absolute pointer-events-none p-4 md:p-6 z-[2] text-lg sm:text-2xl font-bold tracking-tight text-white ">
		                <?= $post["title"] ?>
		            </h2>
					<?php endif; ?>
					<?php if ($post["permalink"] !== ""): ?>
						<a href="<?= $post["permalink"] ?>"
						   class="absolute inset-0 z-1 bg-gradient-b-to-t group-hover:opacity-50 transition-all"></a>
					<?php endif; ?>
	            </div>
			</div>
		<?php endforeach; ?>
	</div>
</div>
