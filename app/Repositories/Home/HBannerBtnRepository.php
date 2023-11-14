<?php

namespace App\Repositories\Home;

use App\Models\HBannerBtn;
use App\Repositories\Home\Interfaces\HBannerBtnInterface;


class HBannerBtnRepository implements HBannerBtnInterface{

    public function all(){
        return HBannerBtn::all();
    }

    public function findById($id){
        return HBannerBtn::findOrFail($id);
    }

    public function storeData($request){
        return HBannerBtn::create($request->validated());
    }

    public function updateData($request, $id){
        $hbannerbtn = $this->findById($id);
        if (!empty($hbannerbtn)) {
            $hbannerbtn->title = $request->title;
            $hbannerbtn->url = $request->url;
            $hbannerbtn->save();
        }
    }

    public function activeData($id){
        $active = $this->findById($id);
        if (!is_null($active)) {
            $active->is_active = 0;
            $active->save();
        }
        $hbannerbtn = $this->findById($id);
        $hbannerbtn->is_active = 1;
        $hbannerbtn->update();
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
