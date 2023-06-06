@extends('layouts.app')
@section('content')
<div class="container p-4 pt-2">
    <h2 class="text-3xl mb-3">Recipes</h2>

    @foreach($recipes as $recipe)
        <div class="mb-3 flex items-center gap-3 flex-wrap">

            <div class="row mb-3">
                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                <div class="col-md-6">
                    <p>{{ $recipe->name }}</p>
                 </div>
            </div>

            <form method="GET" action="{{ route('categories.delete', $recipe->slug) }}">
                @csrf
                <button type="submit" class="mt-3 bg-red-500 hover:bg-red-700 text-black font-bold py-2 px-4 rounded mb-3">Delete</button>
            </form>
        </div>
    @endforeach

    <form method="POST" action="{{ route('recipes.create') }}">
        @csrf

        <div class="mb-3 row">
            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
            <div class="col-md-6">
                <input id="name" type="text" class="bg-white border-gray-600 rounded-lg p-3 w-full text-black" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
            </div>

            @error('name')
                <span class="text-red-500 text-sm" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-3 row">
            <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>
            <div class="col-md-6">
                <textarea id="description" type="text" class="bg-white border-gray-600 rounded-lg p-3 w-full text-black" name="description" required autocomplete="description" autofocus>{{ old('description') }}</textarea>
            </div>

            @error('description')
                <span class="text-red-500 text-sm" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>


        <div class="mb-3 row">
            <label for="category" class="col-md-4 col-form-label text-md-end">{{ __('Category') }}</label>
            <select name="category" class="bg-white border-gray-600 rounded-lg p-3 w-full text-black">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>

            @error('category')
                <span class="text-red-500 text-sm" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>


        <div class="mb-3 row">
            <label for="ingredients[]" class="col-md-4 col-form-label text-md-end">{{ __('Ingredients') }}</label>
            <select name="ingredients[]" multiple class="bg-white border-gray-600 rounded-lg p-3 w-full text-black">
                @foreach($ingredients as $ingredient)
                    <option value="{{ $ingredient->id }}">{{ $ingredient->name }}</option>
                @endforeach
            </select>

            @error('ingredients[]')
                <span class="text-red-500 text-sm" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-3 row">
            <label for="instructions" class="col-md-4 col-form-label text-md-end">{{ __('Instructions') }}</label>
            <div class="col-md-6">
                <textarea id="instructions" type="text" class="bg-white border-gray-600 rounded-lg p-3 w-full text-black" name="instructions" required autocomplete="instructions" autofocus>{{ old('instructions') }}</textarea>
            </div>

            @error('instructions')
                <span class="text-red-500 text-sm" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <button type="submit" class="mt-3 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-3">Create</button>
    </form>
@endsection
