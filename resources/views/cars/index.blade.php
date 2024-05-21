@extends('layouts.app')

@section('content')
    @if (session('error'))
        <div class="alert alert-success" style="color: red">
            {{ session('error') }}
        </div>
    @endif
    <div class="my-10">
        <div class="my-10">
            <a class="p-2 bg-gray-900 text-white" href="{{route('cars.home')}}?updateYear=1">Обновить год</a>
        </div>
        @include('components.cars.table')
    </div>
@endsection
