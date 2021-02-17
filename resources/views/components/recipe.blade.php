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
