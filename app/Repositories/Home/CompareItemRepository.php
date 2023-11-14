<?php

namespace App\Repositories\Home;

use App\Models\CompareItem;

use App\Services\FileUploader;
use RealRashid\SweetAlert\Facades\Alert;
use App\Repositories\Home\Interfaces\CompareItemInterface;

class CompareItemRepository implements CompareItemInterface
{
    public function all()
    {
        return CompareItem::all();
    }
    public function findById($id)
    {
        return CompareItem::findOrFail($id);
    }
    public function storeData($request){
        $createCompareItem = CompareItem::create($request->validated());
         // Service class for Favicon upload // for Compare Item image
         $filePath = (new FileUploader())->uploader($request, 'image', 'home/compare-item');
         if ($request->hasFile('image')) {
             $data['image'] = $filePath;
         }
        $createCompareItem->update($data);
    }

    public function updateData($request, $id)
    {
        $compare_item = $this->findById($id);
        if (!empty($compare_item)) {
            $compare_header->title = $request->title;
            $compare_header->description = $request->description;
            $compare_header->image = $request->image;
            $compare_header->save();
        }
    }
    public function active($id)
    {
        $active = CompareItem::where('is_active', 1)->first();
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