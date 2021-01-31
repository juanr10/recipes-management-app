@extends('layouts.app')

@section('buttons')
    <a class="btn btn-outline-dark mr-2" href="{{ route('recipes.index') }}"><i class="fas fa-th-list"></i> Mis Recetas</a>
    <a class="btn btn-outline-dark mr-2" href="{{ route('profiles.edit', ['profile' => auth()->user()->profile]) }}"><i class="fas fa-edit"></i> Editar Perfil</a>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                @if($profile->image)
                    <img src="/storage/{{ $profile->image }}" alt="profile-image" class="w-100 rounded-circle">
                @endif
            </div>
            <div class="col-md-7 mt-5 mt-md-0">
                <h2 class="text-center mb-2 text-primary">
                    {{ $profile->user->name }}
                </h2>
                <a href=" {{ $profile->user->url }}">Visitar sitio web</a>
                <div class="biography mt-4">
                    {!! $profile->biography !!}
                </div>
            </div>
        </div>
    </div>

    <h3 class="text-center my-5">Recetas creadas por: {{ $profile->user->name }}</h3>
    <div class="container">
        <div class="row mx-auto background-white p-4">
            @forelse ($recipes as $recipe)
                <div class="col-md-4 mb-4 card-group">
                    <div class="card mr-md-2 mr-sm-0">
                        <img src="/storage/{{ $recipe->image }}" class="card-img-top" alt="recipe-image">
                        <div class="card-body">
                          <h5 class="card-title">{{ $recipe->title }}</h5>
                        </div>
                        <div class="card-footer">
                          <a class="btn btn-dark mt-4" href="{{ route('recipes.show', ['recipe' => $recipe]) }}">Ver receta</a>
                        </div>
                      </div>
                </div>
            @empty
                <p class="text-center w-100">Este usuario aún no tiene recetas.</p>
            @endforelse
            <div class="col-12 mt-4 justify-content-center d-flex">
                {{ $recipes->links() }}
            </div>

        </div>
    </div>
@endsection
