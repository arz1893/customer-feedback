<?php

namespace App\Http\Controllers\Complaint;

use App\MasterService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ComplaintServiceController extends Controller
{
    public function complaintService($id) {
        $masterService = MasterService::findOrFail($id);
        return view('complaint.service.complaint_service', compact('masterService'));
    }

    public function addComplaintService(Request $request) {

    }
}
