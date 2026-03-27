<?php

namespace App\Services;

use App\Http\Resources\PatientResource;
use App\Models\Patient;
use Illuminate\Support\Facades\DB;

class PatientService
{
    public function getAllPatients()
    {
        return Patient::all();
    }

    public function storePatient($data)
    {
        return DB::transaction(function () use ($data) {
            $patient = new Patient();
            $patient->fill($data);
            $patient->save();

            return $patient;
        });
    }
}
