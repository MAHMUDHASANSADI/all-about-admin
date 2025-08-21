<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Article/Create') }}
            </h2>
            <a href="{{route('article.index')}}" class="bg-green-700 text-white px-3 py-1 rounded-md text-right">Back</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{route('article.store')}}" method="post">
                        @csrf
                        <div>
                            <label for="title" class="text-lg font-medium">Title</label>
                            <div class="my-3">
                                <input value="{{old('title')}}" name="title" type="text" class="border-gray-300 shadow-sm w-100 rounded-lg text-dark" placeholder="enter title"        style="color: black;"
                                >
                                @error('title')
                                <p class="text-red-500">{{$message}}</p>
                                @enderror
                            </div>

                            <label for="content" class="text-lg font-medium">Content</label>
                            <div class="my-3">
                                <textarea name="text" type="text" class="border-gray-300 shadow-sm w-1/2 rounded-lg text-dark" placeholder="enter content"        style="color: black; height: 200px;">{{old('text')}}</textarea>
                            </div>

                            <label for="author" class="text-lg font-medium">Author Name</label>
                            <div class="my-3">
                                <input value="{{old('author')}}" name="author" type="text" class="border-gray-300 shadow-sm w-100 rounded-lg text-dark" placeholder="enter name"        style="color: black;"
                                >
                                @error('author')
                                <p class="text-red-500">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="flex justify-end">
                                <button class="text-sm px-5 py-3 bg-green-700 rounded-md">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
