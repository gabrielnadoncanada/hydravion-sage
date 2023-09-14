<div @click="sidebarOpen = !sidebarOpen" id="sidebarform-toggle"
	 class="cursor-pointer fixed top-[100px] right-0 z-[9999]">
	<img decoding="async" width="50" src="{{ asset('images/sidebar-form.svg') }}" alt="">
</div>
<aside
		x-show="sidebarOpen"
		x-transition:enter="transition ease-in-out duration-300 transform"
		x-transition:enter-start="-translate-x-full"
		x-transition:enter-end="translate-x-0"
		x-transition:leave="transition ease-in-out duration-300 transform"
		x-transition:leave-start="translate-x-0"
		x-transition:leave-end="-translate-x-full"
		id="secondary"
		class="sidebar-form z-10 bg-primary fixed max-w-full w-[490px] top-0 left-0 bottom-0 text-white py-[120px] px-6 overflow-y-auto">
	{!! do_shortcode('[gravityform id="24" title="false" description="false" ajax="true"]') !!}

	<img class="mt-12" decoding="async" width="100%" src="{{ asset('images/carteQc.png') }}" alt="">

</aside>

