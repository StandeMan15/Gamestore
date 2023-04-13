<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShippingDetailsFormRequest;
use App\Models\ShippingDetails;

class ShippingDetailsController extends Controller
{
    public function store(ShippingDetailsFormRequest $request)
    {
        $validatedData = $request->validated();

        dd($validatedData);

        ShippingDetails::create([
            'fname' => $validatedData['fname'],
            'lname' => $validatedData['lname'],
            'email' => $validatedData['email'],
            'streetname' => $validatedData['streetname'],
            'postalcode' => $validatedData['postalcode'],
            'housenmr' => $validatedData['housenmr'],
            'housenmradd' => $validatedData['housenmradd']
        ]);

    }
}
