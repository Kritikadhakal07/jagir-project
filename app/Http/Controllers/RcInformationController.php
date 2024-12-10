<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRcInformationRequest;
use App\Models\RcInformation;
use App\Services\RcInformationService;
use Illuminate\Http\Request;

class RcInformationController extends Controller
{
    protected $rcInformationService;

    public function __construct(RcInformationService $rcInformationService)
    {
        $this->rcInformationService = $rcInformationService;
    }

    public function create()
    {
        return view('profile-form');
    }

    public function store(StoreRcInformationRequest $request)
    {
        $data = $request->validated();
 
        

        \Log::info($data);

        $rcInformation = $this->rcInformationService->storeRcInformation($data);

        return redirect()->route('profile.success')->with('status', 'Profile created successfully!');
    }

    public function submitForm(Request $request)
    {
        return redirect()->route('dashboard')->with('status', 'Form submitted successfully!');
    }
}
