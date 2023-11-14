<?php

namespace App\Repositories;

use App\Models\TrustedClient;
use RealRashid\SweetAlert\Facades\Alert;
use App\Repositories\Interfaces\TrustedClientInterface;

class TrustedClientRepository implements TrustedClientInterface
{
    public function all()
    {
        return TrustedClient::all();
    }

    public function findById($id)
    {
        return TrustedClient::findOrFail($id);
    }

    public function storeData($request)
    {
        return TrustedClient::create($request->validated());
    }

    public function updateData($request, $id)
    {
        $trustedClient = $this->findById($id);
        if (!empty($trustedClient)) {
            $trustedClient->title = $request->title;
            $trustedClient->save();
        }
    }

    public function active($id)
    {
        $active = TrustedClient::where('is_active', 1)->first();
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
