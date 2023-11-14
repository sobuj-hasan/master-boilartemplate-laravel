<?php

namespace App\Http\Controllers\Backend\Home\Banner;

use Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Home\HBannerBtnRequest;
use RealRashid\SweetAlert\Facades\Alert;
use App\Repositories\Home\Interfaces\HBannerBtnInterface;

class HBannerBtnController extends Controller
{
    private $hbannerbtnRepository;

    public function __construct(HBannerBtnInterface $hbannerbtnRepository)
    {
        $this->hbannerbtnRepository = $hbannerbtnRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hbannerbtn = $this->hbannerbtnRepository->all();
        return view('admin.pages.home.banner.h_banner_btn.index', compact('hbannerbtn'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HBannerBtnRequest $request)
    {
        $this->hbannerbtnRepository->storeData($request);
        Alert::success('Congratulation', 'Header Banner Button Store Successfully');
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $hbannerbtn = $this->hbannerbtnRepository->findById($id);
        return Response::json($hbannerbtn);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->hbannerbtnRepository->updateData($request, $id);
        Alert::success('Congratulation', 'Header Banner Button Store Successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $hbannerbtn = $this->hbannerbtnRepository->findById($id);
        $hbannerbtn->delete();
        Alert::success('Congratulation', 'Header Banner Button Successfully Deleted');
        return redirect()->back();
    }

    public function active($id)
    {
        $this->hbannerbtnRepository->activeData($id);
        Alert::success('Congratulation', 'Header Banner Button Successfully Active');
        return redirect()->back();
    }

    public function deactive($id)
    {
        $active = $this->hbannerbtnRepository->deactiveData($id);

        if (!$active->is_active) {
            Alert::success('Congratulation', 'Header Banner Button Successfully Deactivated');
            return redirect()->back();
        }
        Alert::warning('Oops !!', 'Header Banner Button Is Already Deactive');
        return redirect()->back();
    }
}
