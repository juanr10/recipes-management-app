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
                <tr>
                    <td>Pizza</td>
                    <td>Pizzas</td>
                    <td>

                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
