<nav class="bg-gray-900">
    <div class="container mx-auto px-2">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center justify-center">
                <div class="flex flex-shrink-0 items-center">
                    <a href="{{route('home')}}" class="flex items-center mb-4 sm:mb-0 space-x-3 rtl:space-x-reverse">
                        <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />
                        <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">CarsSite</span>
                    </a>
                </div>
                <div class="hidden sm:ml-6 sm:block">
                    <div class="flex space-x-4">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                        <a href="{{ route('home') }}" class="bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Главная</a>
                        <a href="{{ route('cars.home') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Машины</a>
                        <a href="{{ route('articles.index') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Новости</a>
                    </div>
                </div>
            </div>
            <div class="flex items-center gap-5 pr-2 text-white">
                @auth()
                    {{ \Illuminate\Support\Facades\Auth::user()->name }}
                    <form method="POST" action="{{ route('auth.logout') }}">
                        @csrf
                        <button type="submit" class="px-3 py-5 bg-gray-700">Выйти</button>
                    </form>
                @elseguest()
                    <a href="{{ route('auth.login') }}" class="px-3 py-5">Войти</a>
                    <a href="{{ route('auth.register') }}" class="px-3 py-5 bg-gray-700">Зарегистрироваться</a>
                @endauth
                    <a href="{{ route('cart.index') }}" class="px-3 py-5 bg-gray-800 ml-5 flex items-center">
                        <span class="mr-2">({{ $totalQuantity }})Корзина</span>
                        <svg fill="#ffffff" width="20px" height="20px" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1015.66 284a31.82 31.82 0 0 0-25.998-13.502H310.526l-51.408-177.28c-20.16-69.808-68.065-77.344-87.713-77.344H34.333c-17.569 0-31.777 14.224-31.777 31.776S16.78 79.425 34.332 79.425h137.056c4.336 0 17.568 0 26.593 31.184l176.848 649.936c3.84 13.712 16.336 23.183 30.591 23.183h431.968c13.409 0 25.376-8.4 29.905-21.024l152.256-449.68c3.504-9.744 2.048-20.592-3.888-29.024zM815.026 720.194H429.539L328.387 334.066h616.096zM752.003 848.13c-44.192 0-80 35.808-80 80s35.808 80 80 80 80-35.808 80-80-35.808-80-80-80zm-288 0c-44.192 0-80 35.808-80 80s35.808 80 80 80 80-35.808 80-80-35.808-80-80-80z"/>
                        </svg>
                    </a>
            </div>
        </div>
    </div>
</nav>

