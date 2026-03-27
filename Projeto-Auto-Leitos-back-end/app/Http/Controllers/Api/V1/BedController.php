<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\BedResource;
use App\Http\Resources\BedWithPatientResource;
use App\Models\Bed;
use App\Models\Patient;
use App\Services\Bed\AllocatePatientToBedService;
use App\Services\Bed\GetAllBedsService;
use App\Services\BedService;
use Illuminate\Http\Request;

class BedController extends Controller
{
    public function index(GetAllBedsService $service)
    {
        return $service->execute();
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
    public function show(Bed $bed)
    {
        return new BedResource($bed);
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

    public function allocatePatientToBed(Request $request, Bed $bed, AllocatePatientToBedService $service)
    {
        $patient = Patient::findOrFail($request->patient_id);

        $allocatedBed = $service->execute($bed, $patient);

        return new BedWithPatientResource($allocatedBed);
    }
}
