<div id="current-post">
	<div class="h-screen pt-[100px] px-6 pb-12 relative  flex flex-col justify-end">
		<img
				src="<?= get_the_post_thumbnail_url() ?>"
				class="z-[1] absolute top-0 h-screen object-cover w-full right-0"
				alt=""
		/>
		<div aria-hidden="true" class="absolute inset-0 z-[1] bg-gradient-b-to-t "></div>

		<div class="max-w-[550px] z-[2] mb-7 ">
			<h1 class="text-5xl font-medium mb-5 leading-[1.1]"><?= get_the_title() ?></h1>
			<p><?= get_the_excerpt() ?></p>
		</div>

		<ul class="mb-6">
			<?php if (get_field('duree')): ?>
				<li class="inline-flex py-2 px-5 flex-col text-lg font-semibold bg-primary/80 justify-center border border-white rounded-lg mr-4">
					<span class="text-xs">Durée</span><?= get_field('duree') ?>
				</li>
			<?php endif; ?>
			<?php if (get_field('temps_de_vol')): ?>
				<li class="inline-flex py-2 px-4 flex-col text-lg font-semibold justify-center bg-primary/80 border border-white rounded-lg mr-4">
					<span class="text-xs">Temps de vol</span><?= get_field('temps_de_vol') ?>
				</li>
			<?php endif; ?>
			<?php if (get_field('prix')): ?>
				<li class="inline-flex py-2 px-4 flex-col text-lg font-semibold bg-foreground-light/80 justify-center border border-white rounded-lg mr-4">
					<span class="text-xs">Prix&nbsp;/&nbsp;personne</span><?= get_field('prix') ?>$
				</li>
			<?php endif; ?>
		</ul>
	</div>

	<div class="bg-white text-black">
		<div class="max-w-[1536px] mx-auto px-6 py-12">
			<div class="content">
				<?= the_content() ?>
			</div>
		</div>

		<?php
		if(get_field('leaflet_map')) {
			do_shortcode('[leaflet_map]');
		}

		?>
	</div>
</div>
