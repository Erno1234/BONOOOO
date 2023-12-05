<?php

namespace App\Http\Controllers;

use App\Models\Agency;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function show($id)
    {
        return User::find($id);
    }

    public function destroy($id)
    {
        User::find($id)->delete();
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
    }

    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
    }

    public function osszesAdat()
    {
        $adatok = Event::with('agency')
        ->with('participate')
        ->get();

        return $adatok;
    }

    public function reszvetel(Request $request, $id) { 
        $user = Auth::user(); 
        DB::update("UPDATE participates SET present='$request->state' WHERE event_id=$id AND user_id=$user->id"); 
    }
}
