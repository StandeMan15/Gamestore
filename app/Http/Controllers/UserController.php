<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserFormRequest;
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

    public function update(UserFormRequest $request, $id)
    {
        $validatedData = $request->validated();
        //dd($validatedData);
        User::where('id', $id)
            ->update([
                'fname' => $validatedData['fname'],
                'addition' => $validatedData['mname'],
                'lname' => $validatedData['lname'],
                'streetname' => $validatedData['streetname'],
                'housenmr' => $validatedData['housenmr'],
                'housenmr_extra' => $validatedData['housenmr_extra'],
                'email' => $validatedData['email'],
                'postalcode' => $validatedData['postalcode'],
            ]);

        return redirect('/my-profile')->with('success', __('messages.user.edit'));
    }
    
}
