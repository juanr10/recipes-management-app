@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
@section('content')
    <div class="container new-recipes">
        <h2 class="title-category text-uppercase mt-5 mb-4"> Últimas recetas</h2>

        <div class="owl-carousel owl-theme">
            @foreach($newRecipes as $recipe)
            {{-- <div class="col-md-4 mb-4 card-group"> --}}
                <div class="card">
                    <img src="/storage/{{ $recipe->image }}" class="card-img-top" alt="recipe-image">
                    <div class="card-body">
                      <h5 class="card-title">{{ Str::title($recipe->title) }}</h5>
                      <p>{{ Str::words(strip_tags($recipe->instructions), 20) }}</p>
                    </div>
                    <div class="card-footer justify-content-center d-flex">
                      <a class="btn btn-block btn-dark mt-1" href="{{ route('recipes.show', ['recipe' => $recipe]) }}">Ver receta</a>
                    </div>
                  </div>
            {{-- </div> --}}
            @endforeach
        </div>
    </div>
@endsection
