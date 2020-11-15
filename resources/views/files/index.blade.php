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
                    <div class="flex justify-between mb-6 pb-2 border-b">
                        <h3 class="text-xl font-semibold">All files</h3>
                        <a href="{{ route('files.create') }}" class="px-4 py-1 bg-indigo-500 text-white rounded shadow-sm hover:bg-indigo-400">+ Upload new file</a>
                    </div>

                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <table class="table-auto w-full mb-5">
                        <thead>
                        <tr>
                            <th class="px-4 py-2">ID</th>
                            <th class="px-4 py-2">Title</th>
                            <th class="px-4 py-2">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @forelse($files as $file)
                                <tr>
                                    <td class="border px-4 py-2">{{ $file->id }}</td>
                                    <td class="border px-4 py-2">{{ $file->title }}</td>
                                    <td class="border px-4 py-2">
                                        <a class="text-blue-600 hover:text-orange-600" title="Download file" href="{{ route('files.download', ['file' => $file->id]) }}">
                                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v3.586l-1.293-1.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V8z" clip-rule="evenodd"></path></svg>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="border px-4 py-2 text-center">No records found!</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    {{ $files->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
