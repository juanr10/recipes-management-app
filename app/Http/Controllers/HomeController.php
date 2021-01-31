<?php

namespace App\Http\Controllers;

use App\Recipe;
use App\RecipesCategories;
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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $latestRecipes = Recipe::latest()->take(6)->get();

        $categories = RecipesCategories::all();
        $recipes = [];

        foreach ($categories as $key => $category) {
            $recipes[Str::slug($category->name)][] = Recipe::where('category_id', $category->id)->take(3)->get();
        }


        return view('home', compact('latestRecipes', 'recipes'));
    }
}
