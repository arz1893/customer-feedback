<?php

namespace App\Http\Controllers\Complaint;

use App\ComplaintProduct;
use App\Customer;
use App\MasterProduct;
use App\ProductCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ComplaintProductController extends Controller
{
    public function complaintProduct($id) {
        $masterProduct = MasterProduct::findOrFail($id);
        $productCategories = ProductCategory::where('master_product_id', $masterProduct->id)->where('parent_id', null)->get();
        $customers = Customer::where('tenant_id', Auth::user()->tenant_id)->pluck('name', 'id');
        $complaintProducts = ComplaintProduct::where('master_product_id', $masterProduct->id)->get();
        return view('complaint.product.complaint_product', compact('masterProduct', 'productCategories', 'customers', 'complaintProducts'));
    }

    public function addComplaintProduct(Request $request) {
//        dd($request->all());
        ComplaintProduct::create($request->all());
        return redirect()->back()->with('status', 'New complaint has been added');
    }

    public function editComplaintProduct(Request $request, $id) {
        $complaintProduct = ComplaintProduct::findOrFail($id);
        $masterProduct = MasterProduct::findOrFail($complaintProduct->master_product_id);
        $productCategory = ProductCategory::findOrFail($complaintProduct->product_category_id);
        $customers = Customer::where('tenant_id', Auth::user()->tenant_id)->pluck('name', 'id');
        return view('complaint.product.edit_complaint_product', compact('complaintProduct', 'masterProduct', 'productCategory', 'customers'));
    }

    public function updateComplaintProduct(Request $request, $id) {
        $complaintProduct = ComplaintProduct::findOrFail($id);
        $complaintProduct->update($request->all());
        return redirect()->back()->with('status', 'Complaint has been updated');
    }
}
