@extends('layout.app')

@section('content')
    <h1 class="text-3xl font-semibold	">The list of tasks!</h1>
    <h2 class="text-2xl underline decoration-pink-300  my-5">
        <a href="{{ route('tasks.create') }}">Add Task!</a>
    </h2>
    <div class="mb-10">
        @forelse ($tasks as $task)
            <div class="text-xl font-semibold {{ $task->is_completed ? 'line-through decoration-2' : '' }} mb-4">
                <a href="{{ route('tasks.show', ['task' => $task]) }}">{{ $task->title }}</a>
            </div>
        @empty
            <div class="text-xl font-semibold">
                There are no Tasks yet
            </div>
        @endforelse
    </div>
    @if ($tasks->count())
        <h1>{{ $tasks->links() }}</h1>
    @endif
@endsection
