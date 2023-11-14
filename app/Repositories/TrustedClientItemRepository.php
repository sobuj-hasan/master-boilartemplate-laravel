<?php

namespace App\Repositories;

use App\Models\TrustedClientItem;
use App\Models\TrustedClient;
use App\Services\FileUploader;
use RealRashid\SweetAlert\Facades\Alert;
use App\Repositories\Interfaces\TrustedClientItemInterface;

class TrustedClientItemRepository implements TrustedClientItemInterface
{
    public function all()
    {
        return TrustedClientItem::all();
    }

    public function allHeader()
    {
        return TrustedClient::all();
    }

    public function findById($id)
    {
        return TrustedClientItem::findOrFail($id);
    }

    public function storeData($request)
    {
        $trusted_client_item = TrustedClientItem::create($request->validated());

        // Service class for Item Photo upload
        $filePath = (new FileUploader())->uploader($request, 'photo', 'home/trusted-client');
        if ($request->hasFile('photo')) {
            $data['photo'] = $filePath;
        }

        return $trusted_client_item->update($data);
    }

    public function updateData($request, $id)
    {
        $trustedClient = $this->findById($id);
        if (!empty($trustedClient)) {
            $trustedClient->title = $request->title;
            $trustedClient->trusted_client_id = $request->trusted_client_id;

            // Service class for Item Photo upload
            $filePath = (new FileUploader())->uploader($request, 'photo', 'home/trusted-client');
            if ($request->hasFile('photo')) {
                $trustedClient->photo = $filePath;
            }
            
            $trustedClient->save();
        }
    }

}
