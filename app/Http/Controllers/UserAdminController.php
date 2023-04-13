<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserAdminController extends Controller
{
    public function showadmin()
    {
        if (!auth()->check()) {
            abort(403);
        }

        return view('admin/users.index', [
            'users' => User::paginate(10)
        ]);
    }
}
