<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Permission/Create') }}
            </h2>
            <a href="{{route('permission.index')}}" class="bg-green-600 text-white px-3 py-1 rounded-md text-right">Back</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{route('permission.store')}}" method="post">
                        @csrf
                        <div>
                            <label for="permission" class="text-lg font-medium">Permission Name</label>
                            <div class="my-3">
                                <input value="{{old('name')}}" name="name" type="text" class="border-gray-300 shadow-sm w-1/2 rounded-lg text-dark" placeholder="enter name"        style="color: black;"
                                >
                                @error('name')
                                    <p class="text-red-500">{{$message}}</p>
                                @enderror
                            </div>
                            <button class="text-sm px-5 py-3 bg-slate-700 rounded-md">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
