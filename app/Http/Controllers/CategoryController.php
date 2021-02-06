<?php

namespace App\Http\Controllers;

use App\Recipe;
use App\RecipesCategories;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(RecipesCategories $recipeCategory)
    {
        $recipes = Recipe::where('category_id', $recipeCategory->id)->paginate(3);

        return view('categories.show', compact('recipes', 'recipeCategory'));
    }
}
