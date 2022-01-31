<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>laravel-tasks</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

<!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="">
        <div class="relative flex items-top min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        
            <div class="flex flex-row  mx-0">
                <div class="flex flex-col mx-3 border rounded-xl bg-white  shadow-md px-2 py-6">
                    <img src="https://tailwindcss.com/_next/static/media/sarah-dayan.a8ff3f1095a58085a82e3bb6aab12eb2.jpg" class="w-24 h-24 md:w-48 md:h-auto md:rounded-none rounded-full mx-auto" alt="">
                    <span class="font-bold text-blue-500 uppercase">name</span>
                    <button class="bg-blue-500 p-2 text-white mt-2 border rounded-md ">addfrind</button>
                </div>
            </div>
            <div class="flex flex-col  mx-3 border rounded-xl bg-white  shadow-md px-2 py-6">
                    <img src="https://tailwindcss.com/_next/static/media/sarah-dayan.a8ff3f1095a58085a82e3bb6aab12eb2.jpg" class="w-24 h-24 md:w-48 md:h-auto md:rounded-none rounded-full mx-auto" alt="">
                    <span class="font-bold text-blue-500 uppercase">name</span>
                    <button class="bg-blue-500 p-2 text-white mt-2 border rounded-md ">addfrind</button>
                </div>
                <div class="flex flex-col mx-3 border rounded-xl bg-white  shadow-md px-2 py-6">
                    <img src="https://tailwindcss.com/_next/static/media/sarah-dayan.a8ff3f1095a58085a82e3bb6aab12eb2.jpg" class="w-24 h-24 md:w-48 md:h-auto md:rounded-none rounded-full mx-auto" alt="">
                    <span class="font-bold text-blue-500 uppercase">name</span>
                    <button class="bg-blue-500 p-2 text-white mt-2 border rounded-md ">addfrind</button>
                </div>
            </div>
            </div>
            
        </div>
    </body>
</html>
