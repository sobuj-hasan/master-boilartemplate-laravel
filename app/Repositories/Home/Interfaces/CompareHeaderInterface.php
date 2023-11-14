<?php

namespace App\Repositories\Home\Interfaces;

interface CompareHeaderInterface
{
    public function all();
    public function findById($id);
    public function storeData($request);
    public function updateData($request, $id);
    public function active($id);
    public function deactive($id);

}