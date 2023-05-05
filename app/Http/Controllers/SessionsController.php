<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function index()
    {
        if(!auth()->check()) {
            abort(403);
        }

        if (auth()->user()->is_admin === 1) {
            return view('admin.home', [
            'products' => Product::paginate(10)
            ]);
        } else {
            abort(403);
        }

    }

    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (auth()->attempt($attributes)) {
            session()->regenerate();
            return redirect('/')->with('success', __('messages.user.logged_in'));
        }

        throw ValidationException::withMessages([
            'email' => __('messages.error.wrong_credentials')
        ]);
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', __('messages.user.logged_out'));
    }


}