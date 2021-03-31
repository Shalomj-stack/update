<?php

namespace App\Http\Controllers;

use \App\Models\User;
use \App\Models\Profile;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilesController extends Controller
{

    public function index(User $user)
    {

        return view('profiles.index', compact('user'));
    }

    public function edit(User $user)
    {

        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
        request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => '',
        ]);
        try {

            $profile = Profile::where('user_id', $user->id);



            // check if the total count of entries in the profile table is equals to zero
            // which means user does not exists on the profile table
            if (count($profile->get()) == 0) {
                request()->merge(['user_id' => $user->id]); // merge user_id from user instance to request object array
                $profile->create(request()->all()); // create a new profile account
                return redirect()->route(['profile', $user->id]);
            }
            // update profile
            $profile->update(request()->only(['title', 'description', 'url', 'image']));
            return redirect()->back()->with(['success' => 'profile updated successfully']);
        } catch (Exception $e) {
            return redirect()->back()->with(['failed' => $e->getMessage()]);
        }
    }
}
