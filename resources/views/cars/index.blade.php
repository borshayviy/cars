@extends('layouts.app')

@section('content')
    @if (session('error'))
        <div class="alert alert-success" style="color: red">
            {{ session('error') }}
        </div>
    @endif
    <div class="my-10">
        @include('components.cars.table')
    </div>
@endsection
