@extends('layouts.default')
@section('title')
    {{ $page->title }}
@endsection
@section('content')
    @foreach ($page->content as $block)
        @if ($block['type'] == 'faq')
            @include('pages.partials.faq', ['block' => $block])
        @elseif ($block['type'] == 'call-to-action')
            @include('pages.partials.cta', ['block' => $block])
        @elseif ($block['type'] == 'features')
            @include('pages.partials.features', ['block' => $block])
        @elseif ($block['type'] == 'hero-with-bck-image')
            @include('pages.partials.herobckimage', ['block' => $block])
        @elseif ($block['type'] == 'anchor')
            @include('pages.partials.anchor', ['block' => $block])
        @elseif ($block['type'] == 'hero-with-bck-video')
            @include('pages.partials.herobckvideo', ['block' => $block])
        @elseif ($block['type'] == 'hero-with-image')
            @include('pages.partials.heroimage', ['block' => $block])
        @elseif ($block['type'] == 'hero-with-video')
            @include('pages.partials.herovideo', ['block' => $block])
        @endif
    @endforeach
@endsection