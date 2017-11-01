<?php

namespace App\Http\Controllers\Complaint;

use App\MasterProduct;
use App\MasterService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class ComplaintController extends Controller
{
    public function index() {
        $masterProducts = MasterProduct::where('tenant_id', Auth::user()->tenant_id)
                            ->orderBy('name', 'asc')
                            ->paginate(6);
        $masterServices = MasterService::where('tenant_id', Auth::user()->tenant_id)
                            ->orderBy('name', 'asc')
                            ->paginate(6);
        return view('complaint.complaint_index', compact('masterProducts', 'masterServices'));
    }
}
