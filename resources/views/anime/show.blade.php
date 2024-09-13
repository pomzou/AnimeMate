@extends('layouts.main')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="md:flex">
            <div class="md:flex-shrink-0">
                <img src="{{ $anime['images']['jpg']['large_image_url'] }}" alt="{{ $anime['title'] }}" class="h-full w-full object-cover md:w-48">
            </div>
            <div class="p-8">
                <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold">{{ $anime['type'] }}</div>
                <h1 class="mt-1 text-4xl font-bold">{{ $anime['title'] }}</h1>
                <p class="mt-2 text-gray-500">{{ $anime['synopsis'] }}</p>
                
                <div class="mt-4">
                    <p><strong>Score:</strong> {{ $anime['score'] }}</p>
                    <p><strong>Episodes:</strong> {{ $anime['episodes'] }}</p>
                    <p><strong>Status:</strong> {{ $anime['status'] }}</p>
                    <p><strong>Aired:</strong> {{ $anime['aired']['string'] }}</p>
                </div>
                
                <div class="mt-4">
                    <h2 class="text-xl font-bold">Genres</h2>
                    <div class="flex flex-wrap">
                        @foreach ($anime['genres'] as $genre)
                            <span class="bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{ $genre['name'] }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection