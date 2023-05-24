@extends('layouts.app')

@section('content')
<div class="container p-4 pt-2">
    <h2 class="text-3xl mb-3">Ingredients</h2>

    @foreach($ingredients as $ingredient)
        <div class="mb-3 flex items-center gap-3 flex-wrap">
            <form method="POST" action="{{ route('ingredients.update', $ingredient->id) }}" class="flex items-center gap-3">
                @csrf
                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" value="{{ $ingredient->name }}" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="name" autofocus />

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                     </div>
                </div>

                <button type="submit" class="mt-3 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-3">Update</button>
            </form>
            <form method="GET" action="{{ route('ingredients.delete', $ingredient->id) }}">
                @csrf
                <button type="submit" class="mt-3 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-3">Delete</button>
            </form>
        </div>
    @endforeach

    <form method="POST" action="{{ route('ingredients.create') }}">
        @csrf
        <div class="row mb-3">
            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus />

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

           <button type="submit" class="mt-3 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-3">Submit</button>
    </form>
</div>
@endsection
