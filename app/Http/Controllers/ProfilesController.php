<?php

namespace App\Http\Controllers;

use \App\Models\User;
use \App\Models\Profile;
use Auth;

use Illuminate\Http\Request;

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
        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => '',
        ]);

        $id = Auth::user()->id;

        $profile = Profile::where('user_id', $id)->first();
        $profile->update($data);

        return redirect("/profile/{$user->id}");
    }
}
