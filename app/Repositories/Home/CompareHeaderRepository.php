<?php

namespace App\Repositories\Home;

use App\Models\CompareHeader;
use RealRashid\SweetAlert\Facades\Alert;
use App\Repositories\Home\Interfaces\CompareHeaderInterface;

class CompareHeaderRepository implements CompareHeaderInterface
{
    public function all()
    {
        return CompareHeader::all();
    }
    public function findById($id)
    {
        return CompareHeader::findOrFail($id);
    }
    public function storeData($request){

        CompareHeader::create(['title' => $request->title]);
    }

    public function updateData($request, $id)
    {
        $compare_header = $this->findById($id);
        if (!empty($compare_header)) {
            $compare_header->title = $request->title;
            $compare_header->save();
        }
    }

    public function active($id)
    {
        $active = CompareHeader::where('is_active', 1)->first();
        if (!is_null($active)) {
            $active->is_active = 0;
            $active->save();
        }
        $header = $this->findById($id);
        $header->is_active = 1;
        $header->update();
    }

    public function deactive($id)
    {
        $active = $this->findById($id);

        if ($active->is_active) {
            $active->is_active = 0;
            $active->save();
        }
        return $active;
    }

}