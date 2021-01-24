@extends('layouts.app')

@section('buttons')
<a class="btn btn-dark mr-2" href="{{ route('recipe.index') }}">Volver</a>
@endsection

@section('content')
<h2 class="text-center mb-5">Añade una nueva receta</h2>

<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <form action="{{ route('recipe.store') }}" method="POST" novalidate>
            @csrf
            <div class="form-group">
                <label for="title">Título Receta</label>
                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
                    placeholder="Recipe title"value={{ old('title') }}>
                @error('title')
                    <span class="invalid-feedback d-block font-weight-light" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-dark" value="Añadir receta">
            </div>
        </form>
    </div>
</div>
@endsection
