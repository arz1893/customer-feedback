<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use App\MasterProduct;
use App\MasterService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MasterDataController extends Controller
{
    public function index(Request $request) {
        $productCounter = count(MasterProduct::where('tenant_id', Auth::user()->tenant_id)->get());
        $serviceCounter = count(MasterService::where('tenant_id', Auth::user()->tenant_id)->get());
        return view('master_data.master_data_index', compact('productCounter', 'serviceCounter'));
    }

}
