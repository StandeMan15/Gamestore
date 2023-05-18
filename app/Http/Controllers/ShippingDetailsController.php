<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShippingDetailsFormRequest;
use App\Models\ShippingDetails;
use Clockwork\Request\Request;

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

    public function handledelivery(Request $request)
    {
        $json = $request->getContent();
        $data = json_decode($json);

        // Access and extract relevant information
        $customerName = $data->Customer->Name;
        $customerEmail = $data->Customer->Email;
        // ...

        // Utilize the extracted data in your application logic

        return response()->json(['success' => true]);
    }
}
