<h1>Recetas</h1>
@foreach($recipes as $recipe)
    <p>{{ $recipe }}</p>
@endforeach

<h1>Categorías</h1>
@foreach($categories as $category)
    <p>{{ $category }}</p>
@endforeach
