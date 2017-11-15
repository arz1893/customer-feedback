<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use App\Http\Requests\MasterServiceRequest;
use App\MasterService;
use App\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Webpatser\Uuid\Uuid;

class MasterServiceController extends Controller
{
    public function index() {
        $masterServices = MasterService::where('tenant_id', Auth::user()->tenant_id)->orderBy('name')->get();
        return view('master_data.services.master_service_index', compact('masterServices'));
    }

    public function create() {
        return view('master_data.services.add_master_service');
    }

    public function store(MasterServiceRequest $request) {
        $id = Uuid::generate(4);

        if($request->file('image_cover') != null) {
            $tenant = Tenant::findOrFail(Auth::user()->tenant_id);
            $coverImage = $request->file('image_cover');
            $filename = $id . '_' . $coverImage->getClientOriginalName();

            if(!file_exists(public_path('uploaded_images/' . $tenant->email))) {
                mkdir(public_path('uploaded_images/' . $tenant->email), 0777, true);
                $coverImage->move(public_path('uploaded_images/' . $tenant->email . '/'), $filename);
            } else {
                $coverImage->move(public_path('uploaded_images/' . $tenant->email . '/'), $filename);
                MasterService::create([
                    'id' => $id,
                    'name' => $request->name,
                    'description' => $request->description,
                    'tenant_id' => Auth::user()->tenant_id,
                    'cover_image' => 'uploaded_images/' . $tenant->email . '/' . $filename
                ]);
            }
        } else {
            MasterService::create([
                'id' => $id,
                'name' => $request->name,
                'description' => $request->description,
                'tenant_id' => Auth::user()->tenant_id
            ]);
        }

        return redirect()->route('master_service.index')->with(['status' => 'Service has been added']);
    }

    public function show(MasterService $masterService) {
        return view('master_data.services.show_master_service', compact('masterService'));
    }

    public function edit(MasterService $masterService) {
        return view('master_data.services.edit_master_service', compact('masterService'));
    }

    public function update(MasterServiceRequest $request, MasterService $masterService) {
        $masterService->update($request->all());
        return redirect()->route('master_service.index')->with(['status' => 'Service has been updated']);
    }

    public function deleteService(Request $request) {
        if($request->json()) {
            $masterService = MasterService::findOrFail($request->id);
            $masterService->delete();
            return response()->json(['status' => 'success'], 200);
        } else {
            return redirect()->back();
        }
    }
}
