<?php

namespace App\Http\Controllers;

use App\Recipe;
use App\CategoryRecipe;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(CategoryRecipe $recipeCategory)
    {
        $recipes = Recipe::where('category_id', $recipeCategory->id)->paginate(3);

        return view('categories.show', compact('recipes', 'recipeCategory'));
    }
}
