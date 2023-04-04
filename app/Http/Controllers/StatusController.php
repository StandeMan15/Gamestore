<?php

namespace App\Http\Controllers;

use App\Http\Requests\StatusFormRequest;
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

    public function create()
    {
        return view('admin/status.create');
    }

    public function store(StatusFormRequest $request)
    {
        $validatedData = $request->validated();

        Status::create([
            'title' => $validatedData['title'],
        ]);

        return redirect()->route('showStatusCodes')
        ->with('success', 'Status aangemaakt!');
    }

    public function edit($id)
    {
        $status = Status::find($id);
        return view('admin/status.edit', compact('status'));
    }


    public function update(StatusFormRequest $request, $id)
    {
        $validatedData = $request->validated();

        Status::where('id', $id)
            ->update([
                'title' => $validatedData['title']
            ]);

        return redirect('/admin')
            ->with('success', 'Status succesvol aangepast');
    }

    public function destroy($id)
    {

        Status::destroy($id);

        return redirect('admin/status')->with('success', 'Status is verwijderd');
    }
}
