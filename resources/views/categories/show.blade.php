@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="title-category text-uppercase mt-5 mb-4">
            Categoría: {{ $recipeCategory->name }}
        </h2>

        <div class="row">
            @foreach($recipes as $recipe)
                @include('components.recipe')
            @endforeach
        </div>

        <div class="d-flex justify-content-center mt-5">
            {{ $recipes->links() }}
        </div>
    </div>
@endsection
