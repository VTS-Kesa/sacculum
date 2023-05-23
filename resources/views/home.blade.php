@extends('layouts.app')

@section('content')
<div class="py-3 px-4">
    <h2>Hey there, {{ auth()->user()->name }}!</h2>
</div>
@endsection
