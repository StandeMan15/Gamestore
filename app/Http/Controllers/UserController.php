<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show()
    {
        return view('admin/users.index', [
            'user' => User::all()
        ]);
    }
}
