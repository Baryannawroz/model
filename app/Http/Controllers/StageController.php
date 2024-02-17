<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stage;
use App\Http\Requests\StoreStageRequest;
use App\Http\Requests\UpdateStageRequest;

class StageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Stage::all();
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
        $validatedData = $request->validate([
            'name' => 'required',
            'code' => 'required',
            'department_id' => 'required',
        ]);
        Stage::create([
            'name' => $validatedData['name'],
            'code' => $validatedData['code'],
            'department_id' => $validatedData['department_id'],
        ]);
        return response()->json(['message' => 'Stage added successfully'], 200);
    }


    /**
     * Display the specified resource.
     */
    public function show(Stage $Stage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stage $Stage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Stage $Stage)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'code' => 'required',
        ]);

        $Stage->name = $request->get('name');
        $Stage->code = $request->get('code');
        $Stage->save();

        // You might want to respond with a success message
        return response()->json(['message' => 'Stage updated successfully', 'data' => $Stage]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stage $Stage)
    {
        $Stage->delete();
        return response()->json(['message' => 'Stage Deleted successfully']);
    }
}
