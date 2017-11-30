<?php

namespace App\Http\Controllers\Complaint;

use App\ComplaintProduct;
use App\Customer;
use App\MasterProduct;
use App\ProductCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ComplaintProductController extends Controller
{
    public function complaintProduct($id, $currentNodeId) {
        if($currentNodeId == 0) {
            $masterProduct = MasterProduct::findOrFail($id);
            $productCategories = ProductCategory::where('master_product_id', $masterProduct->id)->where('parent_id', null)->get();
            $selectCustomers = Customer::where('tenant_id', Auth::user()->tenant_id)->pluck('name', 'id');
            return view('complaint.product.complaint_product', compact('masterProduct', 'productCategories', 'selectCustomers'));
        } else {
            $masterProduct = MasterProduct::findOrFail($id);
            $productCategories = ProductCategory::where('parent_id', $currentNodeId)->get();
            $currentParentNode = ProductCategory::findOrFail($currentNodeId);
            $selectCustomers = Customer::where('tenant_id', Auth::user()->tenant_id)->pluck('name', 'id');
            return view('complaint.product.complaint_product', compact('masterProduct', 'productCategories', 'currentParentNode', 'selectCustomers', 'complaintProducts'));
        }
    }

    public function addComplaintProduct(Request $request) {
        $rules = [
            'customer_complaint' => 'required'
        ];
        $messages = [
            'customer_complaint.required' => 'please enter customer\'s complaint'
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        ComplaintProduct::create($request->all());
        return redirect()->back()->with('status', 'New complaint has been added, please check your complaint list');
    }

    public function editComplaintProduct(Request $request, $id) {
        $complaintProduct = ComplaintProduct::findOrFail($id);
        $masterProduct = MasterProduct::findOrFail($complaintProduct->master_product_id);
        $productCategory = ProductCategory::findOrFail($complaintProduct->product_category_id);
        $selectCustomers = Customer::where('tenant_id', Auth::user()->tenant_id)->pluck('name', 'id');
        return view('complaint.product.edit_complaint_product', compact('complaintProduct', 'masterProduct', 'productCategory', 'selectCustomers'));
    }

    public function updateComplaintProduct(Request $request, $id) {
        $complaintProduct = ComplaintProduct::findOrFail($id);
        $complaintProduct->update($request->all());
        return redirect()->route('complaint_product', $complaintProduct->master_product_id)->with('status', 'Complaint has been updated');
    }

    public function deleteComplaintProduct(Request $request) {
        $complaintProduct = ComplaintProduct::findOrFail($request->complaint_id);
        $complaintProduct->delete();
        return redirect()->back()->with('status', 'Complaint has been deleted');
    }
}
