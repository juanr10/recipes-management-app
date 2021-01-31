@extends('layouts.app')

@section('buttons')
    <a class="btn btn-dark mr-2" href="{{ route('recipes.index') }}"><i class="fas fa-arrow-circle-left"></i>  Volver</a>
@endsection

@section('content')
    <h2 class="text-center my-5">
        Recetas que te gustan
    </h2>

    <div class="col-md-10 mx-auto bg-white p-1">
        <ul class="list-group">
            @forelse (auth()->user()->like as $recipe)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <p class="pt-3">{{ $recipe->title }}</p>
                <a class="btn btn-outline-dark" href="{{ route('recipes.show', ['recipe' => $recipe]) }}">Ver receta</a>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <p class="pt-3">{{ $recipe->title }}</p>
                <a class="btn btn-outline-dark" href="{{ route('recipes.show', ['recipe' => $recipe]) }}">Ver receta</a>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <p class="pt-3">{{ $recipe->title }}</p>
                <a class="btn btn-outline-dark" href="{{ route('recipes.show', ['recipe' => $recipe]) }}">Ver receta</a>
            </li>
            @empty
            <p class="text-center w-100">Aún no te ha gustado ninguna receta.</p>
            @endforelse
        </ul>
    </div>
@endsection
