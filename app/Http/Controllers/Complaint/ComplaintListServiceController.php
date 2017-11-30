<?php

namespace App\Http\Controllers\Complaint;

use App\ComplaintService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ComplaintListServiceController extends Controller
{
    public function index() {
        $complaintServices = ComplaintService::where('tenant_id', Auth::user()->tenant_id)->get();
        return view('complaint.service.list.complaint_list_service_index', compact('complaintServices'));
    }

    public function deleteComplaintService(Request $request) {

    }
}
