<?php

namespace App\Services;

use App\Models\RcInformation;

class RcInformationService
{
    public function storeRcInformation(array $data): RcInformation
    {
        
        
       
        if (isset($data['rcCV'])) {
            $data['rcCV'] = $data['rcCV']->store('cv', 'public');
        }

        if (isset($data['rcPhoto'])) {
            $data['rcPhoto'] = $data['rcPhoto']->store('photos', 'public');
        }

        return RcInformation::create($data);
    }

    public function updateRcInformation($rcInformation, $data)
{
    $rcInformation->update($data);
}

    
}
