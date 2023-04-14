<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShippingDetailsFormRequest;
use App\Models\ShippingDetails;

class ShippingDetailsController extends Controller
{
    public function store(ShippingDetailsFormRequest $request)
    {
        $validatedData = $request->validated();
        // dd(session('checkout.order_number'));
        ShippingDetails::create([
            'fname' => $validatedData['fname'],
            'lname' => $validatedData['lname'],
            'streetname' => $validatedData['streetname'],
            'postalcode' => $validatedData['postalcode'],
            'housenmr' => $validatedData['housenmr'],
            'housenmr_extra' => $validatedData['housenmradd'],
            'order_nmr' => session('checkout.order_number')
        ]);

        return redirect()->route('mollie.payment')
        ->with('success', 'Bezorgadres succesvol doorgegeven');
    }
}
