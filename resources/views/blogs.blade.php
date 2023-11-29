@extends('layout.site')

@section('title', 'Rapidez Blog')
@section('description', 'The latest Rapidez news')

@section('content')
@include('partials.hero-simple', ['heading' => 'Read our', 'subheading' => 'Blogs'])
    <div class="relative py-16">
        <div class="absolute inset-x-0 bottom-0 h-96 bg-gray-100"></div>
        <div class="container relative mx-auto max-w-7xl px-6">
            <div class="flex gap-8 max-lg:flex-col">
                @foreach ($blogs->slice(0, 1) as $blog)
                    <a href="/blog/{{ $blog }}" class="flex w-full [&>*>div>h3]:text-3xl lg:[&>*>div>h3]:text-4xl lg:[&>*>img]:h-[416px]">
                        @include('content.blogs.' . $blog, ['overview' => true])
                    </a>
                @endforeach
                @if (count($blogs) > 1)
                    <div class="flex flex-col gap-8 lg:w-2/3">
                        @foreach ($blogs->slice(1, 2) as $blog)
                            <a href="/blog/{{ $blog }}" class="flex lg:h-48 lg:[&>*>img]:aspect-square [&>*]:gap-8 lg:[&>*]:flex-row">
                                @include('content.blogs.' . $blog, ['overview' => true])
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>
            @if (count($blogs) > 3)
                <div class="mt-16 grid gap-x-8 gap-y-16 lg:grid-cols-2 lg:border-t lg:pt-16">
                    @foreach ($blogs->slice(3) as $blog)
                        <a href="/blog/{{ $blog }}" class="flex">
                            @include('content.blogs.' . $blog, ['overview' => true])
                        </a>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
    @include('partials.seperator-clouds')
    @include('partials.call-to-action')
@endsection
