@extends('layouts.app')

@section('buttons')
<a class="btn btn-dark mr-2"
    href="{{ app('router')->getRoutes()->match(app('request')->create(url()->previous()))->getName() == 'profiles.show' ? route('profiles.show', ['profile' => auth()->user()->profile]) : route('recipes.index') }}">
    <i class="fas fa-arrow-circle-left"></i> Volver</a>
@endsection

@section('content')
    <article class="content-recipe bg-white p-5 shadow">
        <h1 class="text-center mb-4">{{ $recipe->title }}</h1>

        <div class="image-recipe">
            <img src="/storage/{{ $recipe->image }}" alt="recipe-image" class="w-100">
        </div>

        <div class="recipe-meta mt-3">
            <p>
                <span class="font-weight-bold text-primary">
                    Categoría:
                    <a href="{{ route('categories.show', ['recipeCategory' => $recipe->category->id]) }}">
                        {{ $recipe->category->name }}
                    </a>
                </span>
            </p>
            <p>
                <span class="font-weight-bold text-primary">
                    Autor:
                    <a href="{{ route('profiles.show', ['profile' => $recipe->author->id]) }}">
                        {{ $recipe->author->name }}
                    </a>
                </span>
            </p>
            <p>
                <span class="font-weight-bold text-primary">
                    Publicada:
                </span>
                @php
                    $date =  $recipe->created_at
                @endphp
                <recipe-date date="{{ $date }}"></recipe-date>
            </p>

            <div class="ingredients">
                <h2 class="my-3 text-primary">Ingredientes</h2>
                {!! $recipe->ingredients !!}
            </div>

            <div class="instructions">
                <h2 class="my-3 text-primary">Instruciones</h2>
                {!! $recipe->instructions !!}
            </div>

            <div class="justify-content-center row text-center">
                <like-button
                    recipe-id="{{ $recipe->id }}"
                    like="{{ $like }}"
                    likes="{{ $likes }}">
                </like-button>
            </div>
        </div>
    </article>
@endsection
