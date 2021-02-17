@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
@endsection

@section('searcher')
    <div class="searcher-categories">
        <form action={{ route('recipes.search') }} class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-md-4 search-text">
                    <p class="display-4">Busca una receta</p>
                    <input type="search" name="search" class="form-control" placeholder="Buscar Receta">
                </div>
            </div>
        </form>
    </div>
@endsection

@section('content')
    <div class="container new-recipes">
        <h2 class="title-category text-uppercase mt-5 mb-4"> Últimas recetas</h2>

        <div class="owl-carousel owl-theme">
            @foreach($latestRecipes as $recipe)
                <div class="card">
                    <img src="/storage/{{ $recipe->image }}" class="card-img-top" alt="recipe-image">
                    <div class="card-body">
                      <h5 class="card-title">{{ Str::title($recipe->title) }}</h5>
                      <p>{{ Str::limit(strip_tags($recipe->instructions), 60) }}</p>
                    </div>
                    <div class="card-footer justify-content-center d-flex">
                      <a class="btn btn-block btn-dark mt-1" href="{{ route('recipes.show', ['recipe' => $recipe]) }}">Ver receta</a>
                    </div>
                  </div>
            @endforeach
        </div>
    </div>

    <div class="container">
        <h2 class="title-category text-uppercase mt-5 mb-4">
            Recetas Populares
        </h2>

        <div class="row">
              @foreach($popularRecipes as $recipe)
                @include('components.recipe')
              @endforeach
        </div>
    </div>

    @foreach($recipes as $key => $group)
        <div class="container">
            <h2 class="title-category text-uppercase mt-5 mb-4">
                {{ str_replace('-', '', $key) }}
            </h2>

            <div class="row">
                @foreach($group as $recipes)
                  @foreach($recipes as $recipe)
                    @include('components.recipe')
                  @endforeach
                @endforeach
            </div>
        </div>
    @endforeach
@endsection
