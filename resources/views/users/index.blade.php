@extends('layouts.app')

@section('content')
<div class="container p-4 pt-2">
    <h2 class="text-3xl mb-3">Users</h2>

    @foreach($users as $user)
        <div class="mb-3 flex flex-col gap-3">
            <p class="text-xl">{{ $user->name }} @if ($user->banned) (Banned) @endif</p>
            @if ($user->banned)
                <form action="{{ route('users.unban', $user->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-3">Unban</button>
                </form>
            @else
                <form action="{{ route('users.ban', $user->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-3">Ban</button>
                </form>
            @endif
        </div>
    @endforeach
</div>
@endsection
