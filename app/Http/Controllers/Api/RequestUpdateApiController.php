<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RequestUpdate;
use Illuminate\Http\Request;

class RequestUpdateApiController extends Controller
{
    public function index()
    {
        return RequestUpdate::all();
    }

    public function show($id)
    {
        $requestUpdate = RequestUpdate::find($id);
        if (!$requestUpdate) return response()->json(['message' => 'Request not found'], 404);
        return $requestUpdate;
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'maintenance_request_id' => 'required|exists:maintenance_requests,id',
            'status' => 'required|in:new,in_progress,completed',
            'note' => 'nullable|string',
            'updated_by' => 'required|exists:users,id',
        ]);

        $newRequest = RequestUpdate::create($validated);
        return response()->json(['message' => 'Request created', 'request' => $newRequest], 201);
    }

    public function update(Request $request, $id)
    {
        $requestUpdate = RequestUpdate::find($id);
        if (!$requestUpdate) return response()->json(['message' => 'Request not found'], 404);

        $validated = $request->validate([
            'maintenance_request_id' => 'sometimes|required|exists:maintenance_requests,id',
            'status' => 'sometimes|required|in:new,in_progress,completed',
            'note' => 'nullable|string',
            'updated_by' => 'sometimes|required|exists:users,id',
        ]);

        $requestUpdate->update($validated);
        return response()->json(['message' => 'Request updated', 'request' => $requestUpdate]);
    }

    public function destroy($id)
    {
        $requestUpdate = RequestUpdate::find($id);
        if (!$requestUpdate) return response()->json(['message' => 'Request not found'], 404);

        $requestUpdate->delete();
        return response()->json(['message' => 'Request deleted']);
    }
}
