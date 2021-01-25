<?php

namespace App\Http\Controllers;

use App\Recipe;
use App\RecipesCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use App\Http\Requests\StoreRecipeRequest;

class RecipeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipes = Auth::user()->recipes;

        return view('recipes.index')
                    ->with('recipes', $recipes)
                    ->with('categories', $recipes);
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

        DB::table('recipes')->insert([
            'title' => $recipe['title'],
            'ingredients' => $recipe['ingredients'],
            'instructions' => $recipe['instructions'],
            'image' => $route_image,
            'user_id' => Auth::user()->id,
            'category_id' => $recipe['category'],
        ]);

        return redirect()->route('recipe.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function show(Recipe $recipe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function edit(Recipe $recipe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recipe $recipe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipe $recipe)
    {
        //
    }
}
