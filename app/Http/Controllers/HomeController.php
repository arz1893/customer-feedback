<?php

namespace App\Http\Controllers;

use App\MasterProduct;
use App\MasterService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->session()->forget('tenant_id');
        $productCounter = count(MasterProduct::where('tenant_id', Auth::user()->tenant_id)->get());
        $serviceCounter = count(MasterService::where('tenant_id', Auth::user()->tenant_id)->get());
        return view('home', compact('productCounter', 'serviceCounter'));
    }
}
