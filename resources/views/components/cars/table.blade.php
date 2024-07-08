<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
        <tr>
            <th scope="col" class="px-6 py-3">
                Наименование
            </th>
            <th scope="col" class="px-6 py-3">
                Описание
            </th>
            <th scope="col" class="px-6 py-3">
                Год
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($cars as $car)
            <tr class="bg-white border-b">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    <a href="{{route('cars.show', $car->name)}}" class="text-blue-800 hover:border-b">
                        {{ $car->name }}</a>
                </th>
                <td class="px-6 py-4">
                    {{ $car->description }}
                </td>
                <td class="px-1 py-4">
                    {{ $car->year }}
                    <form method="POST" action="{{ route('cart.store') }}">
                        @csrf
                        <input type="hidden" value="{{$car->id}}" name="id">
                        <input type="hidden" value="{{$car->description}}" name="description">
                        <input type="hidden" value="{{$car->year}}" name="year">
                        <button type="submit" class="p-2 bg-green-400 text-black ml-3 ">купить</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
