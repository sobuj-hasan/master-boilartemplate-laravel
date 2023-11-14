<?php

namespace App\Repositories\Home;

use App\Models\HBanner;
use App\Repositories\Home\Interfaces\HBannerInterface;


class HBannerRepository implements HBannerInterface{

    public function all(){
        return HBanner::all();
    }

    public function findById($id){
        return HBanner::findOrFail($id);
    }

    public function storeData($request){
        return HBanner::create($request->validated());
    }

    public function updateData($request, $id){
        $hbanner = $this->findById($id);
        if (!empty($hbanner)) {
            $hbanner->title = $request->title;
            $hbanner->description = $request->description;
            $hbanner->save();
        }
    }

    public function activeData($id){
        $active = HBanner::where('is_active', 1)->first();
        if (!is_null($active)) {
            $active->is_active = 0;
            $active->save();
        }
        $hbanner = $this->findById($id);
        $hbanner->is_active = 1;
        $hbanner->update();
    }

    public function deactiveData($id){
        $active = $this->findById($id);

        if ($active->is_active) {
            $active->is_active = 0;
            $active->save();
        }
        return $active;
    }

}
