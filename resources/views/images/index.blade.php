<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Images') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between mb-6 pb-2 border-b">
                        <h3 class="text-xl font-semibold">All images</h3>
                        <a href="{{ route('images.create') }}" class="px-4 py-1 bg-indigo-500 text-white rounded shadow-sm hover:bg-indigo-400">+ Upload new image</a>
                    </div>

                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <vue-picture-swipe :items="{{ json_encode($new) }}"></vue-picture-swipe>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
