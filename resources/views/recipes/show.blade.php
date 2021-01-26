@extends('layouts.app')

@section('buttons')
<a class="btn btn-dark mr-2" href="{{ route('recipe.index') }}">Volver</a>
@endsection

@section('content')
    <article class="content-recipe">
        <h1 class="text-center mb-4">{{ $recipe->title }}</h1>

        <div class="image-recipe">
            <img src="/storage/{{ $recipe->image }}" alt="recipe-image" class="w-100">
        </div>

        <div class="recipe-meta mt-2">
            <p>
                <span class="font-weight-bold text-primary">
                    Escrito en:
                </span>
                {{ $recipe->category->name }}
            </p>
            <p>
                <span class="font-weight-bold text-primary">
                    Autor:
                </span>
                {{ $recipe->author->name }}
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
        </div>
    </article>
@endsection
