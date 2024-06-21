<section class="bg-white dark:bg-gray-900">
    <div class="max-w-screen-xl px-4 py-8 mx-auto sm:py-16 lg:px-6">
        <div class="max-w-screen-sm mx-auto text-center">
            <h2 class="mb-4 text-4xl font-extrabold leading-tight tracking-tight text-gray-900 dark:text-white">{{ $title }}</h2>
            <p class="mb-6 font-light text-gray-500 dark:text-gray-400 md:text-lg">{{ $description }}</p>
            <a href="{{ $url }}" class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">{{ $text }}
                @if(!empty($icon))
                    <x-icon name="{{ $icon }}" class="flex-shrink-0 inline-block w-6 h-6"/>
                @endif
            </a>
        </div>
    </div>
</section>

