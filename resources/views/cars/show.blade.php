@extends('layouts.app')

@section('content')
    <div class="flex">
        <div class="p-10 w-1/3 border-r">
            <div class="flex justify-between items-center">
                <h1 class="flex gap-5 text-2xl">
                    <img itemprop="image" width="24" alt=" " src="/upload/medialibrary/c45/u0nix7juxs85yty4mn0yfd7etnbqm08x.jpg" height="24" title="BMW ">
                    {{ $car->name }}
                </h1>
                <button class="p-2 text-white bg-gray-900">Купить</button>
            </div>
            <p class="text-2xl mt-5 font-bold">{{ $car->year }}</p>
        </div>
        <div class="p-10 w-2/4 border-r">
            <h1>Графики</h1>
        </div>
        <div class="p-10 w-1/3">
            <h1>Новости</h1>
            @foreach($car->articles as $article)
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
        </div>
    </div>
@endsection
