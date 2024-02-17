<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faculty;
use App\Http\Requests\StoreFacultyRequest;
use App\Http\Requests\UpdateFacultyRequest;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Faculty::all();
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
        ]);
        Faculty::create([
            'name' => $validatedData['name'],
            'code' => $validatedData['code'],
        ]);
        return response()->json(['message' => 'Faculty added successfully'], 200);
    }


    /**
     * Display the specified resource.
     */
    public function show(Faculty $faculty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faculty $faculty)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Faculty $faculty)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'code' => 'required',
        ]);

        $faculty->name = $request->get('name');
        $faculty->code = $request->get('code');
        $faculty->save();

        // You might want to respond with a success message
        return response()->json(['message' => 'Faculty updated successfully', 'data' => $faculty]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faculty $faculty)
    {
        $faculty->delete();
        return response()->json(['message' => 'Faculty Deleted successfully']);

    }
}
