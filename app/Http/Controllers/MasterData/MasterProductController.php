<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use App\Http\Requests\MasterProductRequest;
use App\MasterProduct;
use App\MasterProductImage;
use App\ProductCategory;
use App\SubMasterProduct;
use App\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Webpatser\Uuid\Uuid;

class MasterProductController extends Controller
{
    public function index(Request $request) {
        $masterProducts = MasterProduct::where('tenant_id', Auth::user()->tenant_id)->orderBy('created_at', 'desc')->get();
        return view('master_data.products.master_product_index', compact('masterProducts'));
    }

    public function create(Request $request) {
        return view('master_data.products.add_master_product');
    }

    public function store(MasterProductRequest $request) {
        $tenant = Tenant::findOrFail(Auth::user()->tenant_id);
        $image = $request->file('image_cover');
        $id = Uuid::generate(4);
        $filename = $id . '_' . $image->getClientOriginalName();

        if(!file_exists(public_path('uploaded_images/' . $tenant->email))) {
            mkdir(public_path('uploaded_images/' . $tenant->email), 0777, true);
            $image->move(public_path('uploaded_images/' . $tenant->email . '/'), $filename);
        } else {
            $image->move(public_path('uploaded_images/' . $tenant->email . '/'), $filename);
        }

        MasterProduct::create([
            'id' => $id,
            'name' => $request->name,
            'description' => $request->description,
            'specification' => $request->specification,
            'cover_image' => '/uploaded_images/' . $tenant->email . '/' . $filename,
            'tenant_id' => $tenant->id
        ]);

        $request->session()->flash('status', 'Product has been added');

        return redirect()->route('master_product.index');
    }

    public function edit(Request $request, MasterProduct $masterProduct) {
        return view('master_data.products.edit_master_product', compact('masterProduct'));
    }

    public function update(Request $request, MasterProduct $masterProduct) {
        $masterProduct->name = $request->name;
        $masterProduct->description = $request->description;
        $masterProduct->specification = $request->specification;
        $masterProduct->update();

        return redirect()->route('master_product.index')->with(['status' => 'your product has been updated']);
    }

    public function show(Request $request, MasterProduct $masterProduct) {
        $productCategories = ProductCategory::where('master_product_id', $masterProduct->id)->where('parent_id', null)->get();
        return view('master_data.products.show_master_product', compact('masterProduct', 'productCategories'));
    }

    public function deleteProduct(Request $request) {
        if($request->json()) {
            $masterProduct = MasterProduct::findOrFail($request->id);
            unlink(public_path($masterProduct->cover_image));
            $masterProduct->delete();
            return response()->json(['status', 'data has been deleted!'], 200);
        } else {
            return redirect()->back();
        }
    }

    public function changePicture(Request $request, $id) {
        $masterProduct = MasterProduct::findOrFail($id);
        $uploadedImage = $request->file('product_picture');
        $tenant = Tenant::findOrFail(Auth::user()->tenant_id);
        $filename = $masterProduct->id . '_' . $uploadedImage->getClientOriginalName();
        unlink(public_path($masterProduct->cover_image));

        $uploadedImage->move(public_path('uploaded_images/' . $tenant->email . '/'), $filename);
        $masterProduct->cover_image = '/uploaded_images/' . $tenant->email . '/' . $filename;
        $masterProduct->update();

        $request->session()->flash('status', 'Picture has been updated!');
        return redirect()->back();
    }
}
