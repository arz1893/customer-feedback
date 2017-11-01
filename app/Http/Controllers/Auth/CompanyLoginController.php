<?php

namespace App\Http\Controllers\Auth;

use App\Tenant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class CompanyLoginController extends Controller
{
    public function CompanyLogin() {
        return view('auth.company-login');
    }

    public function CheckTenant(Request $request) {
        $tenant = Tenant::where('email', $request->tenant_email)->first();
        if(is_null($tenant)) {
            return redirect()->back()->withErrors(['error' => 'Sorry we couldn\'t find your company']);
        } else {
            $request->session()->put('tenant_id', $tenant->id);
            return Redirect::route('login');
        }
    }
}
