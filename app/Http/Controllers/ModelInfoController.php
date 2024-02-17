<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelInfo;
use App\Http\Requests\StoreModelInfoRequest;
use App\Http\Requests\UpdateModelInfoRequest;

class ModelInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return  response()->json(['models' => ModelInfo::all()], 200);
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
            'module_title' => 'required|string',
            'module_type' => 'required|string',
            'module_code' => 'required|string',
            'ects_credits' => 'required|integer',
            'module_level' => 'required|string',
            'semester_of_delivery' => 'required|string',
            'administering_department' => 'required|string',
            'faculty' => 'required|string',
            'module_leader' => 'required|string',
            'ml_email' => 'required|email',
            'module_leader_acad_title' => 'required|string',
            'module_leader_qualification' => 'required|string',
            'module_tutor' => 'required|string',
            'mt_email' => 'required|email',
            'peer_reviewer_name' => 'required|string',
            'prn_email' => 'required|email',
            'review_committee_approval' => 'required|string',
            'version_number' => 'required|string',
        ]);

        // Store the validated data in the database using Eloquent
        $moduleInfo = ModelInfo::create($validatedData);

        return response()->json(['message' => 'Module information stored successfully', 'data' => $moduleInfo]);
    }

    /**
     * Display the specified resource.
     */
    public function show(ModelInfo $modelInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ModelInfo $modelInfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(request $request, $id)
    {

         $validatedData = $request->validate([
            'module_title' => 'required|string',
            'module_type' => 'required|string',
            'module_code' => 'required|string',
            'ects_credits' => 'required|integer',
            'module_level' => 'required|string',
            'semester_of_delivery' => 'required|string',
            'administering_department' => 'required|string',
            'faculty' => 'required|string',
            'module_leader' => 'required|string',
            'ml_email' => 'required|email',
            'module_leader_acad_title' => 'required|string',
            'module_leader_qualification' => 'required|string',
            'module_tutor' => 'required|string',
            'mt_email' => 'required|email',
            'peer_reviewer_name' => 'required|string',
            'prn_email' => 'required|email',
            'review_committee_approval' => 'required|string',
            'version_number' => 'required|string',
        ]);

        // Find the module by id
        $moduleInfo = ModelInfo::find($id);

        if (!$moduleInfo) {
            return response()->json(['message' => 'Module not found'], 404);
        }

        // Update the module information with the validated data
        $moduleInfo->update($validatedData);
        return response()->json(['message' => 'Module information updated successfully', 'data' => $moduleInfo]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $modelInfo)
    {
        $modelInfo = ModelInfo::find($modelInfo);
        $modelInfo->delete();

        return response()->json('The Module has been deleted');
    }
}
