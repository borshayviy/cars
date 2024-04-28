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
            <div class="flex items-center pr-2 text-white">
                123
            </div>
        </div>
    </div>
</nav>
