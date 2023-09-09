@extends('layout.app')

@section('content')
    <h1 class="text-4xl font-semibold mb-10 text-gray-500 ">Edit Task</h1>
    <form action="{{ route('tasks.update', ['task' => $task]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-5">
            <label for="title" class="block mb-2 text-lg uppercase font-medium text-gray-900 dark:text-white">Title</label>
            <input type="text" name="title" value="{{ @old('title') ?? $task->title }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <p>
                @error('title')
                <h1 class="my-2 text-lg uppercase font-medium text-red-500 dark:text-white">
                    {{ $message }}
                </h1>
            @enderror
            </p>
        </div>
        <div class="mb-5">
            <label for="description"
                class="block mb-2 text-lg uppercase font-medium text-gray-900 dark:text-white">Description</label>
            <textarea type="text" name="description" rows="3"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ @old('description') ?? $task->description }}</textarea>
            <p>
                @error('description')
                <h1 class="my-2 text-lg uppercase font-medium text-red-500 dark:text-white">
                    {{ $message }}
                </h1>
            @enderror
            </p>
        </div>
        <div class="mb-10">
            <label for="long_description"
                class="block mb-2 text-lg uppercase font-medium text-gray-900 dark:text-white">Long Description</label>
            <textarea name="long_description" rows="5"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ @old('long_description') ?? $task->long_description }}</textarea>
            <p>
                @error('long_description')
                <h1 class="my-2 text-lg uppercase font-medium text-red-500 dark:text-white">
                    {{ $message }}
                </h1>
            @enderror
            </p>
        </div>
        <input type="submit" value="Update!"
            class="flex gap-10 mb-2 text-lg uppercase font-medium text-gray-900 dark:text-white">
    </form>
@endsection
