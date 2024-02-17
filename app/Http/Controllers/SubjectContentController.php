<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubjectContent;
use App\Http\Requests\StoreSubjectContentRequest;
use App\Http\Requests\UpdateSubjectContentRequest;

class SubjectContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return SubjectContent::all();
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
            'material_covered' => 'required',

            'subject_id' => 'required',
        ]);
        SubjectContent::create([
            'material_covered' => $validatedData['material_covered'],
            'subject_id' => $validatedData['subject_id'],
        ]);
        return response()->json(['message' => 'SubjectContent added successfully'], 200);
    }


    /**
     * Display the specified resource.
     */
    public function show(SubjectContent $SubjectContent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubjectContent $SubjectContent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubjectContent $SubjectContent)
    {
        $validatedData = $request->validate([
            'material_covered' => 'required',
            'subject_id' => 'required',
        ]);
        
        $SubjectContent->material_covered = $request->get('material_covered');
        $SubjectContent->subject_id = $request->get('subject_id');
        $SubjectContent->save();
        // You might want to respond with a success message
        return response()->json(['message' => 'SubjectContent updated successfully', 'data' => $SubjectContent]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubjectContent $SubjectContent)
    {
        $SubjectContent->delete();
        return response()->json(['message' => 'SubjectContent Deleted successfully']);
    }
}
