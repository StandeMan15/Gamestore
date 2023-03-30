<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show()
    {
        if (!auth()->check()) {
            abort(403);
        }

        return view('admin/users.index', [
            'users' => User::paginate(10)
        ]);
    }

    
}
