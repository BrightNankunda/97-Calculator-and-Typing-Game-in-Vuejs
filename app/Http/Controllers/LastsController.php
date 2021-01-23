<?php

namespace App\Http\Controllers;
use App\Models\Lasts;

use Illuminate\Http\Request;

class LastsController extends Controller
{
    public function index() 
    {
        $lasts = Lasts::all();
        return response()->json($lasts);
    }

    public function store(Request $request)
    {
        $request->validate([
            'pic' => 'required|image|mimes:jpeg,jpg'
        ]);

        $lasts = new Lasts;
        $lasts->name = $request->name;
        
        if($request->hasFile('pic')) {
            $pic = time().".".$request->file('pic')->getClientOriginalName();
            $request->file('pic')->move(public_path('profile'), $pic);
        }
        $lasts->pic = $pic;
        $lasts->save();

        return response()->json($lasts);
        
    }

    public function delete($id)
    {
        Lasts::destroy($id);
        return response()->json('ok');
    }
}
