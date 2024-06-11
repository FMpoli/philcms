<section class="bg-cover bg-center h-screen md:py-0" style="background-image: url('{{ Storage::url($media) }}');">
    <div class="flex items-center justify-center h-full bg-gray-900 bg-opacity-50">
        <div class="text-center">
            <h1 class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl text-white dark:text-white">{{ $title }}</h1>
            <p class="max-w-2xl mb-6 font-light text-gray-200 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">{{ $subtitle }}</p>
            @foreach($buttons as $button)
                <a href="{{ $button['button_url'] }}" class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-white rounded-lg {{ $loop->first ? 'bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900' : 'text-gray-300 hover:text-gray-900 border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800' }}">
                    {{ $button['button_text'] }}
                    <x-icon name="{{ $button['icon'] }}" class="w-6 h-6 ml-2 flex-shrink-0"/>
                </a>
            @endforeach
        </div>
    </div>
</section>