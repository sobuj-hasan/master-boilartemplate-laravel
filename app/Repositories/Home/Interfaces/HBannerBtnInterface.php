<?php

namespace App\Repositories\Home\Interfaces;


interface HBannerBtnInterface
{
    public function all();
    public function findById($id);
    public function storeData($request);
    public function updateData($request, $id);
    public function activeData($id);
    public function deactiveData($id);
}
