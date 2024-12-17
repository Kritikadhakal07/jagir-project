<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRcInformationRequest;
use App\Models\RcInformation;
use App\Services\RcInformationService;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class RcInformationController extends Controller
{
    protected $rcInformationService;

    public function __construct(RcInformationService $rcInformationService)
    {
        $this->rcInformationService = $rcInformationService;

    }
    public function store(StoreRcInformationRequest $request)
{
    $data = $request->validated(); 
    
    
    if (isset($data['rcRole']) && is_array($data['rcRole'])) {
        $data['rcRole'] = implode(',', $data['rcRole']);
    }
    
    $uniqueId = Uuid::uuid4()->toString();

    while (RcInformation::where('rcUniqueId', $uniqueId)->exists()) {
        $uniqueId = Uuid::uuid4()->toString(); 
    }

    $data['rcUniqueId'] = $uniqueId;

    \Log::info('Storing RC Information:', $data); 
    $this->rcInformationService->storeRcInformation($data); 
   

  
    return redirect()->route('profile.form')->with('success', 'The form has been successfully added!');
}


    public function create()
    {
        return view('profile-form');
    }


}