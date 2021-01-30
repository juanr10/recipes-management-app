<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Http\Requests\UpdateProfileRequest;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function show(Profile $profile)
    {
        return view('profiles.show', compact('profile'));
    }

    public function edit(Profile $profile)
    {
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
