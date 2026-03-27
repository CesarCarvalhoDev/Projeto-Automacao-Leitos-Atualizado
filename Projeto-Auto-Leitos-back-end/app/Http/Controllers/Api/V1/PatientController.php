<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePatientRequest;
use App\Http\Requests\UpdatePatientRequest;
use App\Http\Resources\PatientResource;
use App\Models\Patient;
use App\Services\PatientService;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    protected $service;

    public function __construct(PatientService $service)
    {
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = $this->service->getAllPatients();
        return $patients->toResourceCollection(PatientResource::class);
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
    public function store(StorePatientRequest $request)
    {
        $data = $request->validated();

        try {
            $patient = $this->service->storePatient($data);
            return response()->json(new PatientResource($patient), 201);
        } catch (\Exception $ex) {
            return response()->json(['message' => 'Erro ao tentar cadastrar paciente']);
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(Patient $patient)
    {
        return new PatientResource($patient);
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
    public function update(UpdatePatientRequest $request, Patient $patient)
    {
        $data = $request->validated();

        try {
            $patient->update($data);
            return response()->json(new PatientResource($patient), 200);
        } catch (\Exception $ex) {
            return response()->json(['message'=>'Erro ao tentar atualizar paciente'],400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient)
    {
        try {
            $removed = $patient->delete();

            if($removed){
                return response()->json(new PatientResource($patient),200);
            }
        } catch (\Exception $ex) {
            return response()->json(['message' => 'Erro ao deletar paciente'], 400);
        }
    }
}
