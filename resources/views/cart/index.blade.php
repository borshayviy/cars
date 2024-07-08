@extends('layouts.app')

@section('content')
    <div class="my-10">
        <div class="flex justify-between mb-5">
            <h1 class="text-2xl">Корзина</h1>
        </div>
        <table>

        </table>
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Описание
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Год
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Действия
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($cars as $car)
                    <tr class="bg-white border-b">
                        <td class="px-6 py-4">
                            {{ $car['description'] }}
                        </td>
                        <td class="px-1 py-4">
                            {{ $car['year'] }}
                        </td>
                        <td>
                            <a href="{{ route('cart.remove', $car['id']) }}">Удалить</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <h1 class="mt-10 mb-10 text-lg">Оформление заказа</h1>
            <form action="{{ route('cart.send') }}" method="POST">
                @csrf
                <label>
                    <span>Имя</span>
                    <input type="text" name="name" class="block border mb-2 text-sm font-medium text-gray-900"
                           value="{{ is_null(auth()->user()) ? '' : auth()->user()->name }}">
                </label>
                <label>
                    <span>Адрес кошелька</span>
                    <input type="text" name="wallet" class="block border mb-2 text-sm font-medium text-gray-900">
                </label>
                <button type="submit" class="p-2 bg-gray-800 text-white">Заказать</button>
            </form>
        </div>
    </div>
@endsection
