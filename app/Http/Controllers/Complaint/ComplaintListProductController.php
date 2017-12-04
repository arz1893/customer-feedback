<?php

namespace App\Http\Controllers\Complaint;

use App\ComplaintProduct;
use App\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ComplaintListProductController extends Controller
{
    public function index() {
        $complaintProducts = ComplaintProduct::where('tenant_id', Auth::user()->tenant_id)->get();
        return view('complaint.product.list.complaint_list_product_index', compact('complaintProducts'));
    }

    public function editComplaint($id) {
        $complaintProduct = ComplaintProduct::findOrFail($id);
        $selectCustomers = Customer::where('tenant_id', Auth::user()->tenant_id)->get();
        return view('complaint.product.list.complaint_list_product_edit', compact('complaintProduct', 'selectCustomers'));
    }

    public function updateComplaint(Request $request, $id) {
        dd($request->all());
    }
}
