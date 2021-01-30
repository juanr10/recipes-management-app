@extends('layouts.app')

@section('buttons')
    <a class="btn btn-outline-dark mr-2" href="{{ route('recipes.index') }}">Mis Recetas</a>
    <a class="btn btn-outline-dark mr-2" href="{{ route('profiles.edit', ['profile' => auth()->user()->profile] ) }}">Editar Perfil</a>
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
@endsection
