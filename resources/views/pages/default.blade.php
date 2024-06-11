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
        @endif
    @endforeach
@endsection