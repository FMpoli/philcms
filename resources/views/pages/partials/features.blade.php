<section class="bg-white dark:bg-gray-900">
    <div class="max-w-screen-xl px-4 py-8 mx-auto sm:py-16 lg:px-6">
        <div class="max-w-screen-md mb-8 lg:mb-16">
            <h2 class="mb-4 text-4xl font-extrabold tracking-tight text-gray-900 dark:text-white">{{ $block['data']['title'] }}</h2>
            <p class="text-gray-500 sm:text-xl dark:text-gray-400">{{ $block['data']['subtitle'] }}</p>
        </div>
        <div class="space-y-8 md:grid md:grid-cols-2 lg:grid-cols-4 md:gap-12 md:space-y-0">
        @foreach($block['data']['features'] as $feature)
            <div>
                <div class="flex items-center justify-center w-10 h-10 mb-4 rounded-full bg-primary-100 lg:h-12 lg:w-12 dark:bg-primary-900">
                        <x-icon name="{{ $feature['icon'] }}" class="flex-shrink-0 w-6 h-6"/>
                </div>
                <h3 class="mb-2 text-xl font-bold dark:text-white">{{ $feature['title'] }}</h3>
                <p class="text-gray-500 dark:text-gray-400">{{ $feature['description'] }}</p>
            </div>
        @endforeach
        </div>
    </div>
</section>
