<?php

namespace App\Http\Controllers;

use App\Models\Request as ModelsRequest;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.request.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function updateStatus(Request $request, $id)
    {
        // Validate the request
        $validatedData = $request->validate([
            'status' => 'required|in:pending,approved,rejected',
        ]);

        // Find the request by ID
        $requestToUpdate = ModelsRequest::findOrFail($id);

        // Update the status
        $requestToUpdate->status = $validatedData['status'];
        $requestToUpdate->save();

        // Redirect with a success message
        return redirect()->back()->with('success', 'Request status updated successfully.');
    }
}
