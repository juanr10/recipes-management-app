@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css" integrity="sha512-5m1IeUDKtuFGvfgz32VVD0Jd/ySGX7xdLxhqemTmThxHdgqlgPdupWoSN8ThtUSLpAGBvA8DY2oO7jJCrGdxoA==" crossorigin="anonymous" />
@endsection

@section('buttons')
<a class="btn btn-dark mr-2" href="{{ route('recipes.index') }}"><i class="fas fa-arrow-circle-left"></i>  Volver</a>
@endsection

@section('content')
<h2 class="text-center mb-5">Editar receta: {{ $recipe->title }}</h2>

<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <form action="{{ route('recipes.update', ['recipe' => $recipe]) }}" method="POST" enctype="multipart/form-data" novalidate>
            @csrf
            @method("PUT")

            <div class="form-group">
                <label class="font-weight-bold" for="title">Título Receta</label>
                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
                    placeholder="Título de la receta" value={{ $recipe->title }}>
                @error('title')
                    <span class="invalid-feedback d-block font-weight-light" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label class="font-weight-bold" for="category">Categoría</label>
                <select class="form-control @error('category') is-invalid @enderror" name="category" id="category">
                    <option value="">--Selecciona una categoría--</option>
                    @foreach($categories as $category)
                        <option value={{ $category->id }} {{ $recipe->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category')
                    <span class="invalid-feedback d-block font-weight-light" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label class="font-weight-bold" for="ingredients">Ingredientes</label>
                <input type="hidden" name="ingredients" id="ingredients" value="{{ $recipe->ingredients }}">
                <trix-editor class="form-control @error('ingredients') is-invalid @enderror" input="ingredients"></trix-editor>

                @error('ingredients')
                    <span class="invalid-feedback d-block font-weight-light" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label class="font-weight-bold" for="instructions">Instrucciones</label>
                <input type="hidden" name="instructions" id="instructions" value="{{ $recipe->instructions }}">
                <trix-editor class="form-control @error('instructions') is-invalid @enderror" input="instructions"></trix-editor>

                @error('instructions')
                    <span class="invalid-feedback d-block font-weight-light" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label class="font-weight-bold" for="image">Imagen</label>
                <input class="form-control @error('image') is-invalid @enderror" type="file" name="image" id="image">

                <div class="mt-4">
                    <p class="font-weight-bold">Imagen actual:</p>
                    <img src="/storage/{{ $recipe->image }}" alt="recipe-image" style="width: 300px;">
                </div>

                @error('image')
                    <span class="invalid-feedback d-block font-weight-light" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-dark mt-2" value="Actualizar receta">
            </div>
        </form>
    </div>
</div>
@endsection


@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js" integrity="sha512-2RLMQRNr+D47nbLnsbEqtEmgKy67OSCpWJjJM394czt99xj3jJJJBQ43K7lJpfYAYtvekeyzqfZTx2mqoDh7vg==" crossorigin="anonymous" defer></script>
@endsection
