@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
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

    @foreach($recipes as $key => $group)
        <div class="container">
            <h2 class="title-category text-uppercase mt-5 mb-4">
                {{ str_replace('-', '', $key) }}
            </h2>

            <div class="row">
                @foreach($group as $recipes)
                  @foreach($recipes as $recipe)
                    <div class="col-md-4 mt-4">
                        <div class="card shadow">
                            <img class="card-img-top" src="/storage/{{ $recipe->image }}" alt="recipe-image">
                            <div class="card-body">
                                <h4 class="card-title">
                                    {{ $recipe->title }}
                                </h4>

                                <div class="recipe-meta d-flex justify-content-between">
                                    @php
                                        $date =  $recipe->created_at
                                     @endphp

                                    <p class="text-danger date font-weight-bold">
                                        <recipe-date recipe-date date="{{ $date }}"></recipe-date>
                                    </p>

                                    <p><i style="color: rgb(233, 20, 20);" class="fas fa-heart"></i> {{ count($recipe->likes)}}</p>
                                </div>

                                <p class="card-text">
                                    {{ Str::limit(strip_tags($recipe->instructions), 60, ' ...') }}
                                </p>
                            </div>
                            <div class="card-footer justify-content-center d-flex">
                                <a class="btn btn-block btn-dark mt-1" href="{{ route('recipes.show', ['recipe' => $recipe]) }}">Ver receta</a>
                            </div>
                        </div>
                    </div>
                  @endforeach
                @endforeach
            </div>
        </div>
    @endforeach
@endsection
