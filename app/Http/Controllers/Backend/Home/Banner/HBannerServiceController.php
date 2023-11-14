<?php

namespace App\Http\Controllers\Backend\Home\Banner;

use Response;
use App\Http\Controllers\Controller;
use App\Models\HBannerService;
use App\Http\Requests\Home\HBannerServiceRequest;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\Repositories\Home\Interfaces\HBannerServiceInterface;

class HBannerServiceController extends Controller
{

    private $hbannerserviceRepository;

    public function __construct(HBannerServiceInterface $hbannerserviceRepository)
    {
        $this->hbannerserviceRepository = $hbannerserviceRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hbannerservice = $this->hbannerserviceRepository->all();
        return view('admin.pages.home.banner.h_banner_service.index', compact('hbannerservice'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HBannerServiceRequest $request)
    {
        $this->hbannerserviceRepository->storeData($request);
        Alert::success('Congratulation', 'Header Banner Service Store Successfully');
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $hbannerservice = $this->hbannerserviceRepository->findById($id);
        return Response::json($hbannerservice);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->hbannerserviceRepository->updateData($request, $id);
        Alert::success('Congratulation', 'Header Banner Service Store Successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $hbannerservice = $this->hbannerserviceRepository->findById($id);
        $hbannerservice->delete();
        Alert::success('Congratulation', 'Header Banner Service Successfully Deleted');
        return redirect()->back();
    }

    public function active($id)
    {
        $this->hbannerserviceRepository->activeData($id);
        Alert::success('Congratulation', 'Header Banner Service Successfully Active');
        return redirect()->back();
    }

    public function deactive($id)
    {
        $active = $this->hbannerserviceRepository->deactiveData($id);

        if (!$active->is_active) {
            Alert::success('Congratulation', 'Header Banner Service Successfully Deactivated');
            return redirect()->back();
        }
        Alert::warning('Oops !!', 'Header Banner Service Is Already Deactive');
        return redirect()->back();
    }
}
