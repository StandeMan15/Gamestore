<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show()
    {
        return view('user.index', [
            'user' => User::find(auth()->user()->id)
        ]);
    }

    public function edit()
    {
        return view('user.edit', [
            'user' => User::find(auth()->user()->id)
        ]);
    }

    public function update()
    {
        dd('Hello Update');
    }
    
}
