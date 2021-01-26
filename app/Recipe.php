<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $fillable = [
        'title', 'ingredients', 'instructions', 'image', 'category_id'
    ];

    /** Relation 1:1 to Recipes*/
    public function category()
    {
        return $this->belongsTo(RecipesCategories::class);
    }
}
