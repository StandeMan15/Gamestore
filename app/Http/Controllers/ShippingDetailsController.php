<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShippingDetailsFormRequest;
use App\Models\ShippingDetails;

class ShippingDetailsController extends Controller
{
    public function store(ShippingDetailsFormRequest $request)
    {
        $validatedData = $request->validated();
        ShippingDetails::create([
            'fname' => $validatedData['fname'],
            'lname' => $validatedData['lname'],
            'streetname' => $validatedData['streetname'],
            'postalcode' => $validatedData['postalcode'],
            'housenmr' => $validatedData['housenmr'],
            'housenmr_extra' => $validatedData['housenmradd'],
            'order_number' => $validatedData['order_number'],
        ]);

        return redirect()->route('storeorder');
    }
}
