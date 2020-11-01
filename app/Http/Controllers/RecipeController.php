<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function index()
    {
        $recipes = [
            'Receta Pastel de zanahoria',
            'Receta Empanada de carne',
            'Receta Pizza vegana'
        ];

        $categories = [
            'Postres',
            'Bebidas',
            'Vegetariana'
        ];

        return view('recipes.index')
                    ->with('recipes', $recipes)
                    ->with('categories', $categories);
    }
}
