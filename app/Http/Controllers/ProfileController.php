<?php

namespace App\Http\Controllers;

use App\Recipe;
use App\Profile;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Http\Requests\UpdateProfileRequest;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => 'show']);
    }

    public function index()
    {
        //
    }

    public function show(Profile $profile)
    {
        $recipes = Recipe::where('user_id', $profile->user->id)->paginate(6);

        return view('profiles.show', compact('profile', 'recipes'));
    }

    public function edit(Profile $profile)
    {
        $this->authorize('view', $profile);

        return view('profiles.edit', compact('profile'));
    }

    public function update(UpdateProfileRequest $request, Profile $profile)
    {
        //Verify if the profile is from the user (policy)
        $this->authorize('update', $profile);

        $profile->user->name = $request->name;
        $profile->user->url = $request->url;
        $profile->user->save();

        $profile->biography = $request->biography;
        if ($request->image) {
            $route_image = $request->image->store('upload-images-profiles', 'public');
            $img = Image::make(public_path("storage/{$route_image}"))->fit(600, 600);
            $img->save();

            $profile->image = $route_image;
        }

        $profile->save();

        return redirect()->route('recipes.index');
    }
}
