<?php

namespace App\Services\Bed;

use App\Models\Bed;
use App\Models\Patient;
use Exception;
use Illuminate\Support\Facades\DB;

class AllocatePatientToBedService
{
    public function execute(Bed $bed, Patient $patient)
    {
        return DB::transaction(function () use ($bed, $patient)
        {
            if ($bed->status !== 'AVAILABLE') {
                throw new Exception('Bed is not available');
            }

            if ($patient->bed_id !== NULL) {
                throw new Exception('Patient alredy has a bed');
            }

            $bed->status = "OCCUPIED";
            $patient->bed_id = $bed->id;

            $bed->save();
            $patient->save();

            return $bed->load('patient');
        });
    }
}
