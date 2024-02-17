<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Http\Requests\StoreSubjectRequest;
use App\Http\Requests\UpdateSubjectRequest;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Subject::all();
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
        Subject::create([
            'name' => $validatedData['name'],
            'code' => $validatedData['code'],
        ]);
        return response()->json(['message' => 'Subject added successfully'], 200);
    }


    /**
     * Display the specified resource.
     */
    public function show(Subject $Subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subject $Subject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subject $Subject)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'code' => 'required',
        ]);

        $Subject->name = $request->get('name');
        $Subject->code = $request->get('code');
        $Subject->save();

        // You might want to respond with a success message
        return response()->json(['message' => 'Subject updated successfully', 'data' => $Subject]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $Subject)
    {
        $Subject->delete();
        return response()->json(['message' => 'Subject Deleted successfully']);
    }
}
