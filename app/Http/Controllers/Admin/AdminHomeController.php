<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RcInformation;

class AdminHomeController extends Controller
{
   public function index()
   {
      // Fetch all rc_information entries for display on the admin dashboard
      $rcInformations = RcInformation::all();

      return view('admin.auth.dashboard', compact('rcInformations'));
   }
}
