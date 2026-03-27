<?php

namespace App\Services;

use App\Models\Sector;
use Illuminate\Support\Facades\DB;

class SectorService
{
    public function getAll()
    {
        return Sector::all();
    }

    public function storeSector($data)
    {
        return DB::transaction(function () use ($data) {
            $sector = new Sector;
            $sector->fill($data);
            $sector->save();

            return $sector;
        });
    }
}
