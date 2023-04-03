<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function show()
    {
        return view('admin/status.index', [
            'statuses' => Status::paginate(10)
        ]);
    }
}
