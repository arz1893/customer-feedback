<?php

namespace App\Http\Controllers\Complaint;

use App\ComplaintService;
use App\Customer;
use App\MasterService;
use App\ServiceCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ComplaintServiceController extends Controller
{
    public function complaintService($id, $currentNodeId) {
        if($currentNodeId == 0) {
            $masterService = MasterService::findOrFail($id);
            $serviceCategories = ServiceCategory::where('master_service_id', $masterService->id)->where('parent_id', null)->get();
            $selectCustomers = Customer::where('tenant_id', Auth::user()->tenant_id)->pluck('name', 'id');
            return view('complaint.service.complaint_service', compact('masterService', 'serviceCategories', 'selectCustomers'));
        } else {
            $masterService = MasterService::findOrFail($id);
            $serviceCategories = ServiceCategory::where('parent_id', $currentNodeId)->get();
            $currentParentNode = ServiceCategory::findOrFail($currentNodeId);
            $selectCustomers = Customer::where('tenant_id', Auth::user()->tenant_id)->pluck('name', 'id');
            return view('complaint.service.complaint_service', compact('masterService', 'serviceCategories', 'currentParentNode','selectCustomers'));
        }
    }

    public function addComplaintService(Request $request) {
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

        ComplaintService::create($request->all());
        return redirect()->back()->with('status', 'New Complaint has been added, please check your complaint list');
    }

    public function editComplaintService(Request $request, $id) {
        $complaintService = ComplaintService::findOrFail($id);
        $masterService = MasterService::findOrFail($complaintService->master_service_id);
        $serviceCategory = ServiceCategory::findOrFail($complaintService->service_category_id);
        $selectCustomers = Customer::where('tenant_id', Auth::user()->tenant_id)->pluck('name', 'id');
        return view('complaint.service.edit_complaint_service', compact('complaintService','masterService', 'serviceCategory', 'selectCustomers'));
    }

    public function updateComplaintService(Request $request, $id) {
        $complaintService = ComplaintService::findOrFail($id);
        $complaintService->update($request->all());
        return redirect()->route('complaint_list_service.index')->with('status', 'Complaint has been updated');
    }

    public function deleteComplaintService(Request $request) {
        $complaintService = ComplaintService::findOrFail($request->complaint_id);
        $complaintService->delete();
        return redirect()->route('complaint_list_service.index')->with('status', 'Complaint has been deleted!');
    }
}
