@php
$mediaValue = isset($media) ? reset($media) : null;
@endphp

<section style="background-color: {{ $background_color }}">
    <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
        @if($image_position == 'left' && $mediaValue)
            <div class="flex-shrink-0 mb-4 lg:col-span-5 lg:flex lg:justify-start md:mb-0">
                <img class="object-cover w-full h-auto max-h-96 rounded-3xl lg:w-auto" src="{{ Storage::url($mediaValue['path']) }}">
            </div>

            <div class="flex flex-col lg:col-span-7 lg:ml-auto lg:items-start">
                <div class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">
                    {!! $content !!}
                </div>
            </div>
        @elseif($image_position == 'right' && $mediaValue)
            <div class="flex flex-col lg:col-span-7 lg:items-end">
                <div class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">
                    {!! $content !!}
                </div>
            </div>
            <div class="flex-shrink-0 mt-4 lg:col-span-5 lg:flex lg:justify-end md:mt-0">
                <img class="w-full rounded-3xl lg:w-auto" src="{{ Storage::url($mediaValue['path']) }}">
            </div>
        @else
            <div class="flex flex-col lg:col-span-12 lg:items-start">
                <div class="w-full mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">
                    {!! $content !!}
                </div>
            </div>
        @endif
    </div>
</section>
