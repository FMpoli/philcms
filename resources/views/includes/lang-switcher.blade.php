<div x-data="{ open: false }" class="relative">
    <button @click="open = !open" class="flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        <span>{{ strtoupper(app()->getLocale()) }}</span>
        <svg class="w-5 h-5 ml-2 -mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
    </button>
    <div x-show="open" @click.away="open = false" class="absolute right-0 w-48 mt-2 origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
        <div class="py-1" role="none">
            <form action="{{ route('locale.change') }}" method="POST">
                @csrf
                <input type="hidden" name="slug" value="{{ request()->path() }}">
                <button type="submit" name="locale" value="en" class="block w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 {{ app()->getLocale() == 'en' ? 'bg-gray-100' : '' }}" role="menuitem">
                    English
                </button>
                <button type="submit" name="locale" value="it" class="block w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 {{ app()->getLocale() == 'it' ? 'bg-gray-100' : '' }}" role="menuitem">
                    Italian
                </button>
                <!-- Aggiungi altre lingue se necessario -->
            </form>
        </div>
    </div>
</div>
