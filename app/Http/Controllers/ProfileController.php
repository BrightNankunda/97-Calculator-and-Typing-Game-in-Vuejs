<?php

namespace App\Http\Controllers;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = Profile::where('id', 1)->first();
        return response()->json($profile);
    }

    public  function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|string',
            'profile' => 'required|image|mimes:jpeg,jpg'
        ]);

        $profile = new Profile;

        $profile->name = $request->name;
        $profile->email = $request->email;
        $profile->password = $request->password;

        if($request->hasFile('profile')) {
            $name = time().".".$request->file('profile')->getClientOriginalName();
            $request->file('profile')->move(public_path('pic'), $name);
        }
        $profile->profile = $name;
        $profile->save();

        return response()->json($profile);
    }
}
