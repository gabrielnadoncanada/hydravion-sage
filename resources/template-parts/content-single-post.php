<div id="current-post">
	<div class=" h-full py-[10vw] min-h-[500px]   pb-12 relative flex flex-col justify-center">
		<img src="<?= get_the_post_thumbnail_url() ?>" alt=""
		     class="z-[1] absolute top-0 h-full object-cover w-full right-0"
		/>
		<div aria-hidden="true" class="absolute inset-0 z-[1] bg-gradient-b-to-t "></div>
		<div class="mx-auto w-full max-w-[1536px] px-6 z-[2]">
			<div class="max-w-[600px]">
				<div class="flex gap-2 mb-4">
					<?= get_the_category_list('•') ?>
				</div>
				<h1 class="text-6xl font-semibold mb-7 "><?= get_the_title() ?></h1>
			</div>
		</div>
	</div>
	<div class="bg-white text-black">
		<div class="max-w-[1536px] mx-auto px-6 py-12">
			<div class="content">
				<?= the_content() ?>
				<?=
				get_last_post_of_current_post_type()
				?>
			</div>
		</div>
	</div>
</div>
