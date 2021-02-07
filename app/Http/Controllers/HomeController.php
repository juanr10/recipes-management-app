<?php

namespace App\Http\Controllers;

use App\Recipe;
use App\CategoryRecipe;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'index']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //Popular recipes
        // $popularRecipes = Recipe::has('likes', '>', 1)->get();
        $popularRecipes = Recipe::withCount('likes')->orderBy('likes_count', 'desc')->take(3)->get();

        //latest recipes
        $latestRecipes = Recipe::latest()->take(6)->get();

        $categories = CategoryRecipe::all();
        $recipes = [];

        foreach ($categories as $key => $category) {
            $recipes[Str::slug($category->name)][] = Recipe::where('category_id', $category->id)->take(3)->get();
        }


        return view('home', compact('latestRecipes', 'popularRecipes', 'recipes'));
    }
}
