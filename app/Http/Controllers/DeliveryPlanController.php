<?php

namespace App\Http\Controllers;

use App\Models\DeliveryPlan;
use App\Http\Requests\StoreDeliveryPlanRequest;
use App\Http\Requests\UpdateDeliveryPlanRequest;
use App\Models\ModelInfo;
use Illuminate\Http\Request;

class DeliveryPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(['data' => DeliveryPlan::all()], 200);
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
        $request->validate([
            'records' => 'required|array',
            'records.*.modelinfo_id' => 'required',
            'records.*.material_covered_id' => 'required',

        ]);
        $data = $request->json()->all();
        foreach ($data['records'] as $record) {
            DeliveryPlan::create($record);
        }
        return response()->json(['message' => 'Records saved successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(DeliveryPlan $deliveryPlan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DeliveryPlan $deliveryPlan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(request $request,  $modelInfo_id)
    {
        $model =ModelInfo::find($modelInfo_id);
        if(!$model){
            return response()->json(['message'=>'model is not found'], 404);
        }

        $request->validate([
            'records' => 'required|array',
            'records.*.modelinfo_id' => 'required',
            'records.*.material_covered_id' => 'required',
        ]);

        DeliveryPlan::where("modelinfo_id", "=", $modelInfo_id)->delete();
        $data = $request->json()->all();
        foreach ($data['records'] as $record) {
            DeliveryPlan::create($record);
        }
        return response()->json(['message' => 'Records updated successfully']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeliveryPlan $deliveryPlan)
    {
        //
    }
}
