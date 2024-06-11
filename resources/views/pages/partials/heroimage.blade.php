<section class="bg-white dark:bg-gray-900">
    <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
        @if($block['data']['image_position'] == 'left')
            <div class="lg:col-span-5 lg:flex lg:justify-start mb-4 md:mb-0">
                <x-curator-glider :media="$block['data']['media']" class="w-full rounded-3xl lg:w-auto"/>
            </div>
        @endif
        <div class="lg:col-span-7 @if($block['data']['image_position'] == 'left')lg:ml-10 @endif">
            <h1 class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl dark:text-white">{{ $block['data']['title'] }}</h1>
            <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">{{ $block['data']['subtitle'] }}</p>
            @foreach($block['data']['buttons'] as $button)
                <a href="{{ $button['button_url'] }}" class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center rounded-lg {{ $loop->first ? 'text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900' : 'text-gray-500 hover:text-gray-900 border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800' }}">
                    {{ $button['button_text'] }}
                    <x-icon name="{{ $button['icon'] }}" class="w-6 h-6 ml-2 flex-shrink-0"/>
                </a>
            @endforeach
        </div>
        @if($block['data']['image_position'] == 'right')
            <div class="lg:col-span-5 lg:flex mt-4 md:mt-0">
                <x-curator-glider :media="$block['data']['media']" class="w-full rounded-3xl lg:w-auto"/>
            </div>
        @endif
    </div>
</section>