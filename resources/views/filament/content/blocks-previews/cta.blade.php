<section style="background-color: {{ $background_color }}">
    <div class="max-w-screen-xl px-4 py-8 mx-auto sm:py-16 lg:px-6">
        <div class="max-w-screen-sm mx-auto text-center">
            <h2 class="mb-4 text-4xl font-extrabold leading-tight tracking-tight text-gray-900 dark:text-white">{{ $title }}</h2>
            <p class="mb-6 font-light text-gray-500 dark:text-gray-400 md:text-lg">{{ $description }}</p>
            @foreach($buttons as $button)
                <a href="{{ $button['url'] }}" class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center rounded-lg {{ $loop->first ? 'text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900' : 'text-gray-500 hover:text-gray-900 border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800' }}">
                    {{ $button['text'] }}
                    @if(!empty($button['icon']))
                        <x-icon name="{{ $button['icon'] }}" class="flex-shrink-0 inline-block w-6 h-6"/>
                    @endif
                </a>
            @endforeach
        </div>
    </div>
</section>

