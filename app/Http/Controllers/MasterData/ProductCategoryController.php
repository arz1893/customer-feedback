<?php

namespace App\Http\Controllers\MasterData;

use App\ProductCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ProductCategoryController extends Controller
{
    public function store(Request $request) {
        $rules = [
            'name' => 'required',
        ];
        $messages = [
            'name.required' => 'Please enter category name'
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if($request->category_type == 'root') {
            ProductCategory::create([
                'name' => $request->name,
                'master_product_id' => $request->master_product_id
            ]);
            return redirect()->back()->with('status', 'Category has been added');
        } else if($request->category_type == 'sub') {
            $parent = ProductCategory::findOrFail($request->parent_id);
            $child = ProductCategory::create([
                'name' => $request->name
            ]);
            $child->makeChildOf($parent);
            return redirect()->back()->with('status', 'Category has been added');
        }
        return redirect('master_product.show', $request->master_product_id);
    }

    public function updateProductCategory(Request $request) {
        if($request->json()) {
            $category = ProductCategory::findOrFail($request->id);
            $category->update([
                'name' => $request->category_name
            ]);
            return response()->json(['status' => 'Category has been updated'], 200);
        }
        return redirect()->back();
    }

    public function getRoots(Request $request) {
        if($request->json()) {

        }
    }

    public function getTrees(Request $request) {
        if($request->json()) {
            $productCategories = ProductCategory::where('master_product_id', $request->master_product_id)->get();
            $data = [];
            foreach ($productCategories as $productCategory) {
                $data[] = [
                    'title' => $productCategory->name,
                    'key' => $productCategory->id,
                    'folder' => true,
                    'lazy' => true
                ];
            }
            return response()->json($data, 200);
        }
        return redirect()->back();
    }

    public function getChilds(Request $request) {
        if($request->json()) {
            $childs = ProductCategory::where('parent_id', $request->parent_id)->get();
            $data = [];
            foreach ($childs as $child) {
                $data[] = [
                    'title' => $child->name,
                    'key' => $child->id,
                    'folder' => true,
                    'lazy' => true
                ];
            }
            return response()->json($data, 200);
        }
        return redirect()->back();
    }

    public function deleteCategory(Request $request) {
        if($request->json()) {
            $category = ProductCategory::findOrFail($request->id);
            $category->delete();
            return response()->json(['status' => 'Category has been deleted'], 200);
        }
        return redirect()->back();
    }

    public function getProductCategory(Request $request){
        if($request->json()) {
            $productCategory = ProductCategory::findOrFail($request->id);
            return response()->json($productCategory, 200);
        }
        return redirect()->back();
    }

    public function addChildNode(Request $request) {
        if($request->json()) {
            $parent = ProductCategory::findOrFail($request->parent_id);
            $child = ProductCategory::create([
                'name' => $request->name
            ]);
            $child->makeChildOf($parent);
            return response()->json($child->id, 200);
        }
        return redirect()->back();
    }

    public function renameNode(Request $request) {
        dd($request->all());
//        if($request->json()) {
//            dd($request->all());
//        }
//        return redirect()->back();
    }

    public function removeNode(Request $request) {
        if($request->json()) {
            $node = ProductCategory::findOrFail($request->node_id);
            $node->delete();
            return response()->json(['status' => 'success'], 200);
        }
        return redirect()->back();
    }
}
