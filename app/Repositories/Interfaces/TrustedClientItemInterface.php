<?php

namespace App\Repositories\Interfaces;

interface TrustedClientItemInterface
{
    public function all();
    public function allHeader();
    public function findById($id);
    public function storeData($request);
    public function updateData($request, $id);
}
