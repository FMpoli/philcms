<!-- Navigation -->
<nav x-cloak class="fixed w-full z-10 transition duration-300" x-data="{ open: false, isHovered: false, langOpen: false, isHome: false, languages: [], currentLang: '{{ app()->getLocale() }}' }"
    @mouseenter="isHovered = true" @mouseleave="isHovered = false"
    x-init="
        isHome = (window.location.pathname === '/');
        fetch('/get-languages')
            .then(response => response.json())
            .then(data => { languages = data.languages; });
    "
    :class="{'bg-white bg-opacity-100 text-black': isHovered || isScrolled || open || !isHome, 'bg-transparent text-white': !isHovered && !isScrolled && !open && isHome}">
    <div class="container mx-auto px-6 py-3">
        <div class="flex items-center justify-between">
            <div class="text-lg font-semibold">
                <a href="{{ url('/') }}"><img :src="isHovered || isScrolled || open || !isHome ? logoColor : logoWhite" alt="Logo" class="h-10"></a>
            </div>
            <div class="hidden md:flex items-center uppercase">
                @foreach($mainMenuItems->items as $item)
                    <a href="{{ $item['type'] == 'anchor-link' ? $item['data']['page'] . '#' . $item['data']['id'] : $item['data']['url'] }}"
                    {{ isset($item['data']['target']) ? 'target=' . $item['data']['target'] : '' }}
                    class="mx-4 transition duration-300"
                    :class="{'text-black hover:underline': isHovered || isScrolled || !isHome, 'text-white': !isHovered && !isScrolled && isHome}">
                        {{ $item['label'] }}
                    </a>
                @endforeach
                <!--div class="relative" @mouseenter="langOpen = true" @mouseleave="langOpen = false">
                    <button @click="langOpen = !langOpen; console.log(langOpen)" class="focus:outline-none px-4 py-2 rounded" :class="{'bg-blue-500 text-white': langOpen, 'bg-transparent': !langOpen}">Language</button>
                    <div x-show="langOpen" @click.away="langOpen = false" x-transition x-cloak class="absolute mt-2 bg-white rounded shadow-lg">
                        <template x-for="lang in languages" :key="lang">
                            <a href="#" @click.prevent="changeLanguage(lang)" :class="{'bg-blue-500 text-white': currentLang === lang, 'text-black': currentLang !== lang}" class="block px-4 py-2 hover:bg-blue-500 hover:text-white">
                                <span x-text="lang"></span>
                            </a>
                        </template>
                    </div>
                </div-->
                <form action="{{ route('language.switch') }}" method="POST">
                    @csrf
                    <select name="language" onchange="this.form.submit()" id="locale" class="px-4 py-2 rounded">
                            <option value="it">Italiano</option>
                            <option value="en">English</option>
                            
                    </select>
                    
                </form>
            </div>
            <div class="md:hidden flex items-center">
                <button @click="open = !open" class="focus:outline-none" :class="{'text-black': isScrolled || open || !isHome, 'text-white': !isScrolled && !open && isHome}">
                    <svg class="w-6 h-6" fill="none" :stroke="isScrolled || open || !isHome ? 'black' : 'white'" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path :class="{'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        <path :class="{'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>
        <div :class="{'block': open, 'hidden': !open}" class="md:hidden">
            <form class="pt-2">
                <label for="search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="search" id="search"
                        class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Search" required>
                    <button type="submit"
                        class="text-white absolute end-2.5 bottom-2.5 bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">Search</button>
                </div>
            </form>
            @foreach($mainMenuItems->items as $item)
                <a @click="open = !open" href="{{ $item['type'] == 'anchor-link' ? $item['data']['page'] . '#' . $item['data']['id'] : $item['data']['url'] }}"
                {{ isset($item['data']['target']) ? 'target=' . $item['data']['target'] : '' }}
                class="block mt-4 transition duration-300 uppercase" :class="{'text-black hover:underline': open || isScrolled || !isHome, 'text-white': !open && !isScrolled && isHome}">
                    {{ $item['label'] }}
                </a>
            @endforeach
            <div class="relative">
                <button @click="langOpen = !langOpen; console.log(langOpen)" class="block w-full text-left focus:outline-none py-2 mt-4" :class="{'bg-blue-500 text-white': langOpen, 'bg-transparent': !langOpen}">Language</button>
                <div x-show="langOpen" @click.away="langOpen = false" x-transition x-cloak class="mt-2 bg-white rounded shadow-lg">
                    <template x-for="lang in languages" :key="lang">
                        <a href="#" @click.prevent="changeLanguage(lang)" :class="{'bg-blue-500 text-white': currentLang === lang, 'text-black': currentLang !== lang}" class="block px-4 py-2 hover:bg-blue-500 hover:text-white">
                            <span x-text="lang"></span>
                        </a>
                    </template>
                </div>
            </div>
        </div>
    </div>
</nav>

<script>
    function changeLanguage(locale) {
        fetch(`/set-locale/${locale}`)
            .then(response => {
                if (response.ok) {
                    window.location.reload();
                }
            });
    }
</script>