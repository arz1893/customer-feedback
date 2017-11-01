<?php

namespace App\Http\Controllers\Faq;

use App\FaqProduct;
use App\Http\Requests\ProductFaqRequest;
use App\MasterProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FaqProductController extends Controller
{
    public function productFaq($id) {
        $masterProduct  = MasterProduct::findOrFail($id);
        $faqProducts = FaqProduct::where('master_product_id', $id)->get();
        return view('faq.products.product_faq', compact('masterProduct', 'faqProducts'));
    }

    public function addProductFaq($id) {
        $masterProduct = MasterProduct::findOrFail($id);
        return view('faq.products.add_product_faq', compact('masterProduct'));
    }

    public function storeProductFaq(ProductFaqRequest $request, $id) {
        FaqProduct::create([
            'question' => $request->question,
            'answer' => $request->answer,
            'master_product_id' => $id
        ]);
        return redirect()->route('product_faq', $id)->with(['status' => 'FAQ added to current product']);
    }

    public function editProductFaq(Request $request, $id) {
        $faqProduct = FaqProduct::findOrFail($id);
        $masterProduct = MasterProduct::findOrFail($faqProduct->master_product_id);
        return view('faq.products.edit_product_faq', compact('faqProduct', 'masterProduct'));
    }

    public function updateProductFaq(ProductFaqRequest $request, $id) {
        $faqProduct = FaqProduct::findOrFail($id);
        $faqProduct->update($request->all());

        $masterProduct = MasterProduct::findOrFail($faqProduct->master_product_id);

        return redirect()->route('product_faq', $masterProduct->id)->with(['status' => 'FAQ has been updated']);
    }

    public function deleteProductFaq(Request $request, $id) {
        if($request->json()) {
            $faqProduct = FaqProduct::findOrFail($request->id);
            $faqProduct->delete();
            return response()->json(['status' => 'faq has been deleted'], 200);
        } else {
            return redirect()->back();
        }
    }
}
