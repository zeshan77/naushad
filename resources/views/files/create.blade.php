<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Files') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between mb-4">
                        <h3 class="text-xl font-semibold">Create new file</h3>
                        <a href="{{ route('files.index') }}" class="px-4 py-1 bg-indigo-500 text-white rounded shadow-sm hover:bg-indigo-400">View all files</a>
                    </div>

                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form action="{{ route('files.store') }}" enctype="multipart/form-data" method="post">
                        @csrf

                        <div class="mt-4">
                            <x-label for="title" value="Title" />

                            <x-input id="title" class="block mt-1 w-full" type="text" name="title" required autofocus />
                        </div>

                        <div class="mt-4">
                            <x-label for="pdf" value="PDF" />

                            <x-input accept="application/pdf" type="file" name="pdf" id="pdf" class="form-input w-full" required/>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-3">Submit</x-button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
