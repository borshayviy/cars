@extends('layouts.app')

@section('content')
    <div class="my-10 justify-between">
        <div class="">
            <span class="p-1.5 bg-blue-300 mb-5">{{ $article->category->name }}</span>
            <h1 class="text-2xl">{{ $article->title }}</h1>
            <img src="{{ asset ( 'storage/' . $article->image) }}" alt="" class="w-full h-24">
            <div class="flex gap-5">
            <span class="text-sm">
                    Просмотры:
                    {{ $article->view_count }}
                </span>
                <span class="text-sm">
                    Лайки:
                    {{ $article->like }}
            </span>
            </div>
            <div class="mt-10">
                {{ $article->body }}
            </div>
        </div>
        @if(! is_null($article->car))
            <div class="border p-5">
                <h1 class="text-xl">Название {{ $article->car->name }} ({{ $article->car->description }})</h1>
                <p class="text-md">Год: {{ $article->car->year }}</p>
            </div>
        @endif

        <div class="mt-10 b-t">
            @foreach($article->comments as $comment)
                <div class="p-4 border">
                    <div>{{ $comment->user->name }}, {{ $comment->created_at }}</div>
                    <div class="mb-2">
                        {{ $comment->text }}
                    </div>
                </div>
            @endforeach
        </div>
        @auth()
            <div class="mt-10">
                <h1>Добавить комментарий</h1>
                <form action="{{ route('comment.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="article_id" value="{{ $article->id }}">
                    <textarea name="text" class="p-5 w-96 block-border mb-2"></textarea>
                    <button class="p-3 bg-gray-800 text-white">Отправить</button>
                </form>
            </div>
        @endauth
    </div>
@endsection
