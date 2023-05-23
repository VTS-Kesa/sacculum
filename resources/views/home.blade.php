@extends('layouts.app')

@section('content')
<div class="py-3 px-4">
    <h2>Hey there, {{ auth()->user()->name }}!</h2>
    <p class="mb-2">Want to update your profile?</p>
    <a href="{{ route('profile') }}" class="mt-3 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Click here</a>
</div>
@endsection
