<?php

namespace App\Services\Bed;

use App\Http\Resources\BedResource;
use App\Models\Bed;

class GetAllBedsService
{
    public function execute()
    {
        $beds = Bed::all()->toResourceCollection(BedResource::class);
        return $beds;
    }
}
