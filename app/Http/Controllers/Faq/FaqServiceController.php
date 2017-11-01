<?php

namespace App\Http\Controllers\Faq;

use App\FaqService;
use App\Http\Requests\ServiceFaqRequest;
use App\MasterService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FaqServiceController extends Controller
{
    public function serviceFaq($id) {
        $faqServices = FaqService::where('master_service_id', $id)->get();
        $masterService = MasterService::findOrFail($id);
        return view('faq.service.service_faq', compact('masterService', 'faqServices'));
    }

    public function addServiceFaq($id) {
        $masterService = MasterService::findOrFail($id);
        return view('faq.service.add_service_faq', compact('masterService'));
    }

    public function storeServiceFaq(ServiceFaqRequest $request, $id) {
        FaqService::create([
            'question' => $request->question,
            'answer' => $request->answer,
            'master_service_id' => $id
        ]);

        return redirect()->route('service_faq', $id)->with(['status' => 'FAQ added to current service']);
    }

    public function editServiceFaq($id) {
        $faqService = FaqService::findOrFail($id);
        $masterService = MasterService::findOrFail($faqService->master_service_id);
        return view('faq.service.edit_service_faq', compact('faqService', 'masterService'));
    }

    public function updateServiceFaq(ServiceFaqRequest $request, $id) {
        $faqService = FaqService::findOrFail($id);
        $faqService->update($request->all());

        return redirect()->route('service_faq', $faqService->master_service_id)->with(['status' => 'FAQ has been updated!']);
    }

    public function deleteServiceFaq(Request $request) {
        if($request->json()) {
            $faqService = FaqService::findOrFail($request->id);
            $faqService->delete();
            return response()->json(['status' => 'FAQ has been deleted'], 200);
        } else {
            return redirect()->back();
        }
    }
}
