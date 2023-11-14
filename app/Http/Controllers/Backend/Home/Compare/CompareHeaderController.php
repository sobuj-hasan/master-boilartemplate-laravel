<?php

namespace App\Http\Controllers\Backend\Home\Compare;

use Illuminate\Http\Request;
use App\Models\CompareHeader;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Illuminate\Console\View\Components\Alert;
use App\Http\Requests\Home\CompareHeaderStoreRequest;
use App\Repositories\Home\Interfaces\CompareHeaderInterface;

class CompareHeaderController extends Controller
{
    protected $compareHeaderRepository;
    public function __construct(CompareHeaderInterface $compareHeaderRepository)
    {
         $this->compareHeaderRepository = $compareHeaderRepository;
    }
    public function index()
    {
        $compareHeaderAllData = $this->compareHeaderRepository->all();
        return view('admin.pages.compare_section.compare_header.index')->with( 'allData', $compareHeaderAllData);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompareHeaderStoreRequest $request)
    {
        // dd($request);
        $this->compareHeaderRepository->storeData($request);
        return redirect()->route('compare-header.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $compare_header = $this->compareHeaderRepository->findById($id);
        return Response::json($compare_header);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompareHeaderStoreRequest $request, string $id)
    {
        $this->compareHeaderRepository->updateData($request, $id);
        // Alert::success('Congratulation', 'Header Successfully Updated');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CompareHeader $compareHeader)
    {
        $compareHeader->delete();
        // Alert::success('Congratulation', 'CompareHeader Successfully Deleted');
        return redirect()->back();
    }

    public function active($id)
    {
        $this->compareHeaderRepository->active($id);
        // Alert::success('Congratulation', 'Header Successfully Activated');
        return redirect()->back();
    }
    public function deactive($id)
    {
        $active = $this->compareHeaderRepository->deactive($id);
        if (!$active->is_active) {
            // Alert::success('Congratulation', 'Header Successfully Deactivated');
            return redirect()->back();
        }
        // Alert::warning('Oops !!', 'Header Is Already Deactive');
        return redirect()->back();
    }


}
