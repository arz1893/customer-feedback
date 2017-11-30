<?php

namespace App\Http\Controllers\Complaint;

use App\ComplaintProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ComplaintListController extends Controller
{
    public function index() {
        $complaintProducts = ComplaintProduct::where('tenant_id', Auth::user()->tenant_id)->get();
        return view('complaint.product.list.complaint_list_product_index', compact('complaintProducts'));
    }
}
