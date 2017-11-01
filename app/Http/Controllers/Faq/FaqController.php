<?php

namespace App\Http\Controllers\Faq;

use App\FaqProduct;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductFaqRequest;
use App\MasterProduct;
use App\MasterService;
use App\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FaqController extends Controller
{
    public function index(Request $request) {
        $masterProducts = MasterProduct::where('tenant_id', Auth::user()->tenant_id)->
                          orderBy('name', 'asc')->
                          paginate(6);
        $masterServices = MasterService::where('tenant_id', Auth::user()->tenant_id)
                            ->orderBy('name', 'asc')
                            ->paginate(6);
        return view('faq.faq_index', compact('masterProducts', 'masterServices'));
    }

}
