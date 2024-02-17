<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Http\Requests\StoreDepartmentRequest;
use App\Http\Requests\UpdateDepartmentRequest;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Department::all();
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
            'faculty_id' => 'required',
        ]);
        Department::create([
            'name' => $validatedData['name'],
            'code' => $validatedData['code'],
            'faculty_id' => $validatedData['faculty_id'],
        ]);
        return response()->json(['message' => 'Department added successfully'], 200);
    }


    /**
     * Display the specified resource.
     */
    public function show(Department $Department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $Department)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Department $Department)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'code' => 'required',
        ]);

        $Department->name = $request->get('name');
        $Department->code = $request->get('code');
        $Department->save();

        // You might want to respond with a success message
        return response()->json(['message' => 'Department updated successfully', 'data' => $Department]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $Department)
    {
        $Department->delete();
        return response()->json(['message' => 'Department Deleted successfully']);
    }
}
