@extends('layouts.app')

@section('content')
    <div class="my-10">
        <div class="flex justify-between mb-5">
            <h1 class="text-2xl">Список машин</h1>
            <a href="{{ route('cars.home') }}" class="text-gray-900 bg-white border border-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Все машины</a>
        </div>
        @include('components.cars.table')
    </div>
@endsection
