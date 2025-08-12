<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Permission List') }}
            </h2>
            <a href="{{ route('permission.create') }}"
               class="bg-green-600 text-white px-3 py-1 rounded-md text-right">Create</a>
        </div>

    </x-slot>

    <div class="py-12">
        <div class="max-w-lg mx-auto">
            @include('components.message')
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class=" p-6 text-gray-900 dark:text-gray-100">
                    <table class="min-w-full border border-gray-300">
                        <thead class="bg-gray-100 dark:bg-gray-700">
                        <tr>
                            <th class="px-4 py-2 border">SL</th>
                            <th class="px-4 py-2 border">Name</th>
                            <th class="px-4 py-2 border">Created at</th>
                            <th class="px-4 py-2 border">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($permissions as $index => $permission)
                            <tr>
                                <td class="text-center px-4 py-2 border">{{ $index + 1 }}</td>
                                <td class="text-center px-4 py-2 border">{{ $permission->name }}</td>
                                <td class="text-center px-4 py-2 border">{{\Carbon\Carbon::parse($permission->created_at)->format('d M, Y')}}</td>
                                <td class="text-center px-4 py-2 border space-x-2">
                                    <a href="{{ route('permission.edit', $permission->id) }}"
                                       class="bg-blue-600 text-white px-3 py-1 rounded-md">Edit</a>

                                    <form action="{{ route('permission.destroy', $permission->id) }}"
                                          method="POST" class="inline-block"
                                          onsubmit="return confirm('Are you sure you want to delete this permission?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="bg-amber-950 text-white px-3 py-1 rounded-md">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mb-3 mx-1.5">
                    {{$permissions->links()}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
