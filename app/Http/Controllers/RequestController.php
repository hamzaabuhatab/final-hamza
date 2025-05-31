<?php

namespace App\Http\Controllers;

use App\Models\RequestUpdate;
use Illuminate\Http\Request;


class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $requests = RequestUpdate::with(['maintenanceRequest', 'updatedBy'])->get();
        return view('requests.index', compact('requests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('requests.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $validated = $request->validate([
            'maintenance_request_id' => 'required|exists:maintenance_requests,id',
            'status' => 'required|in:new,in_progress,completed',
            'note' => 'nullable|string',
            'updated_by' => 'required|exists:users,id',
        ]);

        RequestUpdate::create($validated);

        return redirect()->route('requests.index')->with('success', 'added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $request = RequestUpdate::findOrFail($id);
        return view('requests.edit', compact('request'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestUpdate $request, $id)
    {
        //

        $requestUpdate = RequestUpdate::findOrFail($id);

        $requestUpdate->update($request->validate([
            'maintenance_request_id' => 'required|exists:maintenance_requests,id',
            'status' => 'required|in:new,in_progress,completed',
            'note' => 'nullable|string',
            'updated_by' => 'required|exists:users,id',
        ]));

        return redirect()->route('requests.index')->with('success', 'request updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $requestUpdate = RequestUpdate::findOrFail($id);
        $requestUpdate->delete();

        return redirect()->route('requests.index')->with('success', 'rquest deleted successfully.');
    }
}
