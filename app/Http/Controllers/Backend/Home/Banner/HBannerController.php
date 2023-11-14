<?php

namespace App\Http\Controllers\Backend\Home\Banner;

use Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\Home\HBannerRequest;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\Repositories\Home\Interfaces\HBannerInterface;

class HBannerController extends Controller
{
    private $hbannerRepository;

    public function __construct(HBannerInterface $hbannerRepository)
    {
        $this->hbannerRepository = $hbannerRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hbanner = $this->hbannerRepository->all();
        return view('admin.pages.home.banner.h_banner.index', compact('hbanner'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HBannerRequest $request)
    {
        $this->hbannerRepository->storeData($request);
        Alert::success('Congratulation', 'Header Banner Store Successfully');
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $hbanner = $this->hbannerRepository->findById($id);
        return Response::json($hbanner);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->hbannerRepository->updateData($request, $id);
        Alert::success('Congratulation', 'Header Banner Update Successfully');
        return redirect()->back();
    }

    public function active($id)
    {
        $this->hbannerRepository->activeData($id);
        Alert::success('Congratulation', 'Header Banner Successfully Activated');
        return redirect()->back();
    }

    public function deactive($id)
    {
        $active = $this->hbannerRepository->deactiveData($id);

        if (!$active->is_active) {

            Alert::success('Congratulation', 'Header Banner Successfully Deactivated');
            return redirect()->back();
        }
        Alert::warning('Oops !!', 'Header Banner Is Already Deactive');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $hbanner = $this->hbannerRepository->deactiveData($id);
        $hbanner->delete();
        Alert::success('Congratulation', 'Header Banner Successfully Deleted');
        return redirect()->back();
    }
}
