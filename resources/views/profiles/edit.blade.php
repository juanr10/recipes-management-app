@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css" integrity="sha512-5m1IeUDKtuFGvfgz32VVD0Jd/ySGX7xdLxhqemTmThxHdgqlgPdupWoSN8ThtUSLpAGBvA8DY2oO7jJCrGdxoA==" crossorigin="anonymous" />
@endsection

@section('buttons')
<a class="btn btn-dark mr-2" href="{{ route('recipes.index') }}">Volver</a>
@endsection

@section('content')
    <h1 class="text-center">Editar Mi Perfil</h1>

    <div class="row justify-content-center mt-5">
        <div class="col-md-10 bg-white p-3">
            <form action="{{ route('profiles.update', ['profile' => $profile]) }}" method="POST" enctype="multipart/form-data" novalidate>
                @csrf
                @method("PUT")

                {{-- {{ dd($profile->user->name) }} --}}

                <div class="form-group">
                    <label class="font-weight-bold" for="name">Nombre</label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                    placeholder="Nombre del usuario" value={{ $profile->user->name }}>
                    @error('name')
                    <span class="invalid-feedback d-block font-weight-light" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="font-weight-bold" for="url">Sitio web</label>
                    <input type="text" name="url" id="url" class="form-control @error('url') is-invalid @enderror"
                    placeholder="Tu sitio web" value={{ $profile->user->url }}>
                    @error('url')
                    <span class="invalid-feedback d-block font-weight-light" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="font-weight-bold" for="biography">Biografía</label>
                    <input type="hidden" name="biography" id="biography" value="{{ $profile->biography }}">
                    <trix-editor class="form-control @error('biography') is-invalid @enderror" input="biography"></trix-editor>

                    @error('biography')
                        <span class="invalid-feedback d-block font-weight-light" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="font-weight-bold" for="image">Tu imagen</label>
                    <input class="form-control @error('image') is-invalid @enderror" type="file" name="image" id="image">

                    @if($profile->image)
                        <div class="mt-4">
                            <p class="font-weight-bold">Imagen actual:</p>
                            <img src="/storage/{{ $profile->image }}" alt="recipe-image" style="width: 300px;">
                        </div>
                    @endif

                    @error('image')
                        <span class="invalid-feedback d-block font-weight-light" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                    <div class="form-group">
                    <input type="submit" class="btn btn-dark mt-2" value="Actualizar perfil">
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js" integrity="sha512-2RLMQRNr+D47nbLnsbEqtEmgKy67OSCpWJjJM394czt99xj3jJJJBQ43K7lJpfYAYtvekeyzqfZTx2mqoDh7vg==" crossorigin="anonymous" defer></script>
@endsection
