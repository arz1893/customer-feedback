<?php

namespace App\Http\Controllers\Complaint;

use App\MasterProduct;
use App\ProductCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ComplaintProductController extends Controller
{
    public function complaintProduct($id) {
        $masterProduct = MasterProduct::findOrFail($id);
        $productCategories = ProductCategory::where('master_product_id', $masterProduct->id)->where('parent_id', null)->get();
        return view('complaint.product.complaint_product', compact('masterProduct', 'productCategories'));
    }

    public function addComplaintProduct($id) {
        $masterProduct = MasterProduct::findOrFail($id);
        return view('complaint.product.add_complaint_product', compact('masterProduct'));
    }
}
