@extends('layouts.app')

@section('content')
    @foreach($articles as $article)
        <div class="m-5 border p-5 w-64">
            <span class="p-1.5 bg-blue-300 mb-2 block w-fit">{{ $article->category->name }}</span>
            <a href="{{route('articles.show', $article->slug)}}" class="text-2xl hover: bg-blue-100">
                {{$article->title}}
            </a>
            <div class="w-full">
                <img src="{{ asset ( 'storage/' . $article->image) }}" alt="" class="w-full h-24">
            </div>
            <div class="flex gap-2">
                <span class="text-sm">
                    Просмотры:
                    {{ $article->view_count }}
                </span>
                <span class="text-sm">
                    Лайки:
                    {{ $article->like }}
                </span>
            </div>
        </div>
    @endforeach
@endsection
