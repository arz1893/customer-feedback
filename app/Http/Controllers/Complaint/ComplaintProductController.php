<?php

namespace App\Http\Controllers\Complaint;

use App\MasterProduct;
use App\SubMasterProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ComplaintProductController extends Controller
{
    public function complaintProduct($id) {
        $masterProduct = MasterProduct::findOrFail($id);
        $subMasterProducts = SubMasterProduct::where('master_product_id', $id)->get();
        return view('complaint.product.complaint_product', compact('masterProduct', 'subMasterProducts'));
    }

    public function addComplaintProduct($id) {
        $masterProduct = MasterProduct::findOrFail($id);
        return view('complaint.product.add_complaint_product', compact('masterProduct'));
    }
}
