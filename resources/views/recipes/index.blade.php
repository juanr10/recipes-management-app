@extends('layouts.app')

@section('buttons')
    <a class="btn btn-dark mr-2" href="{{ route('recipes.create') }}">Crear receta</a>
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
                        <div class="btn-group">
                            <button type="button" class="btn btn-dark dropdown-toggle text-white" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Acciones
                            </button>
                            <div class="dropdown-menu">
                                <a href="{{ route('recipes.show', ['recipe' => $recipe]) }}" class="dropdown-item">Ver</a>
                                <a href="{{ route('recipes.edit', ['recipe' => $recipe]) }}" class="dropdown-item">Editar</a>
                                <form method="post" action="{{ route('recipes.destroy', ['recipe' => $recipe]) }}">
                                    @csrf
                                    @method("DELETE")
                                    <input type="submit" class="dropdown-item"  value="Eliminar">
                                </form>
                            </div>
                          </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
