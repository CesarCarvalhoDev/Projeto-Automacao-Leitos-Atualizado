<?php

namespace App\Services\Bed;

use App\Models\Bed;
use Illuminate\Support\Facades\DB;

class CreateBedService
{
    public function execute($data)
    {
        return DB::transaction(function () use ($data) {
            $bed = new Bed();
            $bed->fill($data);
            $bed->save();

            return $bed;
        });
    }
}
