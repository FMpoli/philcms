<section class="relative h-screen flex items-center justify-center overflow-hidden">
    <video autoplay loop muted playsinline class="hero-bg-video" controls>
        <source src="{{ Storage::url($video) }}" type="video/mp4" />
      Your browser does not support the video tag.
    </video>

    <div class="absolute inset-0 bg-gray-900 bg-opacity-50"></div>
    <div class="relative text-center max-w-2xl mx-auto px-4">
        <h1 class="text-white text-5xl font-bold">{{ $title }}</h1>
        <p class="text-white text-lg mt-4 mb-4">{{ $subtitle }}</p>
        @foreach($buttons as $button)
            <a href="{{ $button['button_url'] }}" class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-white rounded-lg {{ $loop->first ? 'bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900' : 'text-gray-300 hover:text-gray-900 border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800' }}">
                @if($button['icon_position'] == 'left' && $button['icon'])
                    <x-icon name="{{ $button['icon'] }}" class="w-6 h-6 mr-2 flex-shrink-0"/>
                @endif
                {{ $button['button_text'] }}
                @if($button['icon_position'] == 'right' && $button['icon'])
                    <x-icon name="{{ $button['icon'] }}" class="w-6 h-6 ml-2 flex-shrink-0"/>
                @endif
            </a>
        @endforeach
    </div>
</section>