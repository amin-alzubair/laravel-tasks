<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <div class="flex flex-row  mx-0">
                <div class="flex flex-col mx-3 border rounded-xl bg-white  shadow-md px-2 py-6">
                    <img src="https://tailwindcss.com/_next/static/media/sarah-dayan.a8ff3f1095a58085a82e3bb6aab12eb2.jpg" class="w-24 h-24 md:w-48 md:h-auto md:rounded-none rounded-full mx-auto" alt="">
                    <span class="font-bold text-blue-500 uppercase">{{$user->name}}</span>
                    <button class="bg-blue-500 p-2 text-white mt-2 border rounded-md ">addfrind</button>
                </div>
            </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
