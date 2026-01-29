<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $tab = $request->query('page', 'sell');

        $items = collect();

        return view('profile', compact('user', 'items', 'tab'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('profile-edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $user->name = $request->input('name');
        $user->postal_code = $request->input('postal_code');
        $user->address = $request->input('address');
        $user->phone = $request->input('phone');

        $user->save();

        return redirect()->route('mypage');
    }
}