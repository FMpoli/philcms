<section class="bg-white dark:bg-gray-900">
    <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 [&_[x-cloak]]:hidden" x-data="{ modalOpen: false }">
        
        @if($video_position == 'left')
            <div class="lg:col-span-5 lg:flex lg:justify-end mb-4 md:mb-0">
                <div class="[&_[x-cloak]]:hidden">
                    <!-- Video thumbnail -->
                    <button
                        class="relative flex justify-center items-center focus:outline-none focus-visible:ring focus-visible:ring-indigo-300 rounded-3xl group"
                        @click="modalOpen = !modalOpen"
                        aria-controls="modal"
                        aria-label="Watch the video"
                    >
                        <x-curator-glider :media="$video_thumbnail" class="w-full rounded-3xl lg:w-auto"/>
                        <!-- Play icon -->
                        <svg class="absolute pointer-events-none group-hover:scale-110 transition-transform duration-300 ease-in-out" xmlns="http://www.w3.org/2000/svg" width="72" height="72">
                            <circle class="fill-white" cx="36" cy="36" r="36" fill-opacity=".8" />
                            <path class="fill-indigo-500 drop-shadow-2xl" d="M44 36a.999.999 0 0 0-.427-.82l-10-7A1 1 0 0 0 32 29V43a.999.999 0 0 0 1.573.82l10-7A.995.995 0 0 0 44 36V36c0 .001 0 .001 0 0Z" />
                        </svg>
                    </button>
                    <!-- End: Video thumbnail -->
                </div>  
            </div>
        @endif
        <!-- Modal backdrop -->
        <div
            class="fixed inset-0 z-[99999] bg-black bg-opacity-50 transition-opacity"
            x-show="modalOpen"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-out duration-100"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0" 
            aria-hidden="true"
            x-cloak
            @click.away="modalOpen = false"
            @keydown.escape.window="modalOpen = false"
        ></div>
        <!-- End: Modal backdrop -->                        
        <div class="lg:col-span-7 @if($video_position == 'left')lg:ml-10 @endif">
            <h1 class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl dark:text-white">{{ $title }}</h1>
            <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">{{ $subtitle }}</p>
            @foreach($buttons as $button)
                <a href="{{ $button['button_url'] }}" class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center rounded-lg {{ $loop->first ? 'text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900' : 'text-gray-500 hover:text-gray-900 border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800' }}">
                    {{ $button['button_text'] }}
                    <x-icon name="{{ $button['icon'] }}" class="w-6 h-6 ml-2 flex-shrink-0"/>
                </a>
            @endforeach
        </div>
        <!-- Modal dialog -->
        <div
            id="modal"
            class="fixed inset-0 z-[99999] flex p-6"
            role="dialog"
            aria-modal="true"
            x-show="modalOpen"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-75"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-out duration-200"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-75"
            x-cloak
        >
            <div class="max-w-5xl mx-auto h-full flex items-center">
                <div
                    class="w-full max-h-full rounded-3xl shadow-2xl aspect-video bg-black overflow-hidden"
                    @click.outside="modalOpen = false"
                    @keydown.escape.window="modalOpen = false"
                >
                    <video x-init="$watch('modalOpen', value => value ? $el.play() : $el.pause())" width="1920" height="1080" loop controls>
                        <source src="{{ Storage::url($video) }}" type="video/mp4" />
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div>
        </div>
        <!-- End: Modal dialog -->
        @if($video_position == 'right')
            <div class="lg:col-span-5 lg:flex mt-4 md:mt-0">
                <div class="[&_[x-cloak]]:hidden">
                    <!-- Video thumbnail -->
                    <button
                        class="relative flex justify-center items-center focus:outline-none focus-visible:ring focus-visible:ring-indigo-300 rounded-3xl group"
                        @click="modalOpen = !modalOpen"
                        aria-controls="modal"
                        aria-label="Watch the video"
                    >
                        <x-curator-glider :media="$video_thumbnail" class="w-full rounded-3xl lg:w-auto"/>
                        <!-- Play icon -->
                        <svg class="absolute pointer-events-none group-hover:scale-110 transition-transform duration-300 ease-in-out" xmlns="http://www.w3.org/2000/svg" width="72" height="72">
                            <circle class="fill-white" cx="36" cy="36" r="36" fill-opacity=".8" />
                            <path class="fill-indigo-500 drop-shadow-2xl" d="M44 36a.999.999 0 0 0-.427-.82l-10-7A1 1 0 0 0 32 29V43a.999.999 0 0 0 1.573.82l10-7A.995.995 0 0 0 44 36V36c0 .001 0 .001 0 0Z" />
                        </svg>
                    </button>
                    <!-- End: Video thumbnail -->
                </div>
        @endif
    </div>
</section>