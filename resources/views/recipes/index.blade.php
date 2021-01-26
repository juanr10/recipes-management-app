@extends('layouts.app')

@section('buttons')
    <a class="btn btn-dark mr-2" href="{{ route('recipe.create') }}">Crear receta</a>
@endsection

@section('content')
    <h2 class="text-center mb-5">Mis recetas</h2>

    <div class="col-md-10 mx-auto bg-white p-3">
        <table class="table table-striped">
            <thead class="bg-dark text-light">
                <tr class="">
                    <th scope="col">Título</th>
                    <th scope="col">Categoría</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($recipes as $recipe)
                <tr>
                    <td>{{ $recipe->title }}</td>
                    <td>{{ $recipe->category->name }}</td>
                    <td>
                        <a href="{{ route('recipe.destroy', ['recipe' => $recipe]) }}" class="btn btn-danger mr-1">Eliminar</a>
                        <a href="{{ route('recipe.edit', ['recipe' => $recipe]) }}" class="btn btn-dark mr-1">Editar</a>
                        <a href="{{ route('recipe.show', ['recipe' => $recipe]) }}" class="btn btn-success mr-1">Ver</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
