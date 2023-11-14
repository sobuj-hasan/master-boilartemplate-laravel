<?php

namespace App\Http\Controllers\Backend\Home\Compare;

use App\Models\CompareItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Controller;
use Illuminate\Console\View\Components\Alert;
use App\Http\Requests\Home\CompareItemStoreRequest;
use App\Repositories\Home\Interfaces\CompareItemInterface;

class CompareItemController extends Controller
{
    protected $compareItem;
    public function __construct(CompareItemInterface $compareItem)
    {
         $this->compareItem = $compareItem;
    }

    public function index()
    {
        $allItems = $this->compareItem->all();
        // dd($data);

        return view('admin.pages.compare_section.compare_item.index',compact('allItems'));
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
    public function store(CompareItemStoreRequest $request)
    {
        // dd($request);
        $this->compareItem->storeData($request);
        return redirect()->route('compare-item.index');
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
        $compare_item = $this->compareItem->findById($id);
        return Response::json($compare_item);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompareItemStoreRequest $request, string $id)
    {
        $this->compareItem->updateData($request, $id);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CompareItem $compareItem)
    {
        $compareItem->delete();
         return redirect()->back();
    }

    public function active($id)
    {
        $this->compareItem->active($id);
         return redirect()->back();
    }
    public function deactive($id)
    {
        $active = $this->compareItem->deactive($id);
        if (!$active->is_active) {
            return redirect()->back();
        }
         return redirect()->back();
    }
}
