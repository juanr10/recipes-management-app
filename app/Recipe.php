<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $fillable = [
        'title', 'ingredients', 'instructions', 'image', 'category_id'
    ];

    /** Relation 1:1 to Category*/
    public function category()
    {
        return $this->belongsTo(CategoryRecipe::class);
    }

    /** Relation 1:1 to User*/
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /** Likes received on a recipe*/
    public function likes()
    {
        return $this->belongsToMany(User::class, 'likes_recipe');
    }
}
