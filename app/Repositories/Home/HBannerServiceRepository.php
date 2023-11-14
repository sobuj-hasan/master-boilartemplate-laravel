<?php

namespace App\Repositories\Home;

use App\Models\HBannerService;
use App\Repositories\Home\Interfaces\HBannerServiceInterface;


class HBannerServiceRepository implements HBannerServiceInterface{

    public function all(){
        return HBannerService::all();
    }

    public function findById($id){
        return HBannerService::findOrFail($id);
    }

    public function storeData($request){
        return HBannerService::create($request->validated());
    }

    public function updateData($request, $id){
        $hbannerservice = $this->findById($id);
        if (!empty($hbannerservice)) {
            $hbannerservice->title = $request->title;
            $hbannerservice->save();
        }
    }

    public function activeData($id){
        $active = $this->findById($id);
        if (!is_null($active)) {
            $active->is_active = 0;
            $active->save();
        }
        $hbannerservice = HBannerService::findOrFail($id);
        $hbannerservice->is_active = 1;
        $hbannerservice->update();
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
