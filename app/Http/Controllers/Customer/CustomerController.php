<?php

namespace App\Http\Controllers\Customer;

use App\Customer;
use App\Http\Requests\CustomerRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function store(CustomerRequest $request) {
        $birthdate = date('Y-m-d', strtotime($request->input('birthdate')));

        Customer::create([
            'name' => $request->name,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'birthdate' => $birthdate,
            'address' => $request->address,
            'nation' => $request->nation,
            'city' => $request->city,
            'memo' => $request->memo,
            'tenant_id' => Auth::user()->tenant_id
        ]);

        return redirect()->back()->with(['status' => 'Customer has been added']);
    }
}
