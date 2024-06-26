<section style="background-color: {{ $background_color }}">
    <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 [&_[x-cloak]]:hidden" x-data="{ modalOpen: false }">
        <h1 class="mb-6 text-3xl font-bold">Ultime News</h1>
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
            <!-- Inizio di una news -->
            <div class="overflow-hidden bg-white rounded-lg shadow-md">
                <img src="https://picsum.photos/200/300" alt="Immagine della news" class="object-cover w-full h-48">
                <div class="p-4">
                    <h2 class="text-xl font-semibold">Titolo della News 1</h2>
                    <p class="text-sm text-gray-500">1 Giugno 2024</p>
                    <p class="mt-2 text-gray-700">Questo è un breve testo di esempio per la news 1...</p>
                </div>
            </div>
            <!-- Fine di una news -->

            <!-- Ripetere per altre news -->
            <div class="overflow-hidden bg-white rounded-lg shadow-md">
                <img src="https://picsum.photos/200/300" alt="Immagine della news" class="object-cover w-full h-48">
                <div class="p-4">
                    <h2 class="text-xl font-semibold">Titolo della News 2</h2>
                    <p class="text-sm text-gray-500">2 Giugno 2024</p>
                    <p class="mt-2 text-gray-700">Questo è un breve testo di esempio per la news 2...</p>
                </div>
            </div>

            <div class="overflow-hidden bg-white rounded-lg shadow-md">
                <img src="https://picsum.photos/200/300" alt="Immagine della news" class="object-cover w-full h-48">
                <div class="p-4">
                    <h2 class="text-xl font-semibold">Titolo della News 3</h2>
                    <p class="text-sm text-gray-500">3 Giugno 2024</p>
                    <p class="mt-2 text-gray-700">Questo è un breve testo di esempio per la news 3...</p>
                </div>
            </div>

            <div class="overflow-hidden bg-white rounded-lg shadow-md">
                <img src="https://picsum.photos/200/300" alt="Immagine della news" class="object-cover w-full h-48">
                <div class="p-4">
                    <h2 class="text-xl font-semibold">Titolo della News 4</h2>
                    <p class="text-sm text-gray-500">4 Giugno 2024</p>
                    <p class="mt-2 text-gray-700">Questo è un breve testo di esempio per la news 4...</p>
                </div>
            </div>
        </div>
        <div class="mt-6 text-center">
            <a href="/tutte-le-news" class="font-semibold text-blue-500 hover:text-blue-700">Tutte le News</a>
        </div>
    </div>
</section>
