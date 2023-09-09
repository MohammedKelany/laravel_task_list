@extends('layout.app')

@section('content')
    <div>
        <h1 class="text-4xl mb-10">{{ $task->title }}</h3>
            @if (session()->has('status'))
                <div class="p-5 bg-green-100 border-2 rounded-xl mb-5 border-green-500">
                    <h1 class="font-semibold text-2xl text-green-700 mb-5">Success!</h1>
                    <h2 class="text-xl text-green-700">
                        {{ session()->get('status') }}
                    </h2>
                </div>
            @endif
            <h2 class=" mb-5">
                <a href="{{ route('tasks.index') }}" class="underline decoration-pink-300 text-2xl"> <- Go Back to task
                        list!</a>
            </h2>
            <h5 class="text-xl mb-5">{{ $task->description }}</h5>
            <p class="text-xl mb-5">{{ $task->long_description }}</p>
            <h4 class="text-lg mb-5 text-slate-500">
                Created {{ $task->created_at->diffForHumans() }}
                Updated {{ $task->updated_at->diffForHumans() }}
            </h4>
            @if ($task->is_completed)
                <h1 class="text-xl font-semibold mb-5 text-green-400">Completed</h1>
            @else
                <h1 class="text-xl font-semibold  mb-5 text-red-500">Not Completed</h1>
            @endif
            <div class="flex gap-5 font-semibold text-slate-500 text-xl">
                <a class="inline-block btn" href="{{ route('tasks.edit', ['task' => $task]) }}">Edit</a>
                <form class="inline-block btn" method="POST"
                    action="{{ route('tasks.toggle_complete', ['task' => $task]) }}">
                    @csrf
                    @method('PUT')
                    <input type="submit" name="update"
                        value="Mark As {{ $task->is_completed ? 'Not Completed' : 'Completed' }}">
                </form>
                <form class="inline-block btn" method="POST" action="{{ route('tasks.destroy', ['task' => $task]) }}">
                    @csrf
                    @method('DELETE')
                    <input type="submit" name="delete" value="Delete">
                </form>
            </div>
    </div>
@endsection
