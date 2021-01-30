<?php

namespace App\Http\Controllers;

use App\Recipe;
use App\RecipesCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use App\Http\Requests\StoreRecipeRequest;
use App\Http\Requests\UpdateRecipeRequest;

class RecipeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipes = Auth::user()->recipes;

        return view('recipes.index', compact('recipes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = RecipesCategories::all(['id', 'name']);

        return view('recipes.create')
            ->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRecipeRequest $request)
    {
        $recipe = $request->all();
        $route_image = $recipe['image']->store('upload-images-recipes', 'public');

        //Resize image
        $img = Image::make(public_path("storage/{$route_image}"))->fit(1000, 550);
        $img->save();

        Auth::user()->recipes()->create([
            'title' => $recipe['title'],
            'ingredients' => $recipe['ingredients'],
            'instructions' => $recipe['instructions'],
            'image' => $route_image,
            'category_id' => $recipe['category'],
        ]);

        return redirect()->route('recipes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function show(Recipe $recipe)
    {
        return view('recipes.show', compact('recipe'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function edit(Recipe $recipe)
    {
        $categories = RecipesCategories::all(['id', 'name']);

        return view('recipes.edit', compact('recipe', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRecipeRequest $request, Recipe $recipe)
    {
        //Verify if the recipe is from the user (policy)
        $this->authorize('update', $recipe);

        $recipe->title = $request->title;
        $recipe->category_id = $request->category;
        $recipe->ingredients = $request->ingredients;
        $recipe->instructions = $request->instructions;

        if ($request->image) {
            $route_image = $request->image->store('upload-images-recipes', 'public');
            $img = Image::make(public_path("storage/{$route_image}"))->fit(1000, 550);
            $img->save();

            $recipe->image = $route_image;
        }

        $recipe->save();

        return redirect()->route('recipes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipe $recipe)
    {
        $this->authorize('delete', $recipe);
        $recipe->delete();

        return redirect()->route('recipes.index');
    }
}
