<?php

namespace App\Http\Controllers\Backend\Home\trustedClient;

use Illuminate\Http\Request;
use App\Models\TrustedClientItem;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\TrustedClientItemRequest;
use App\Repositories\Interfaces\TrustedClientItemInterface;


class TrustrdClientItemsController extends Controller
{
    private $trustedClientItemRepository;

    public function __construct(TrustedClientItemInterface $trustedClientItemRepository)
    {
        $this->trustedClientItemRepository = $trustedClientItemRepository;
    }

    public function index()
    {
        $trusted_client_items = $this->trustedClientItemRepository->all();
        $trusted_client_headers = $this->trustedClientItemRepository->allHeader();
        return view('admin.pages.home.trusted-client.trusted_client_items.index', compact('trusted_client_items', 'trusted_client_headers'));
    }

    function store(TrustedClientItemRequest $request)
    {
        $this->trustedClientItemRepository->storeData($request);
        Alert::success('Congratulation', 'Client Items Successfully Created');
        return redirect()->back();
    }

    public function edit(string $id)
    {
        $trustedClientItems = $this->trustedClientItemRepository->findById($id);
        return Response::json($trustedClientItems);
    }

    public function update(TrustedClientItemRequest $request, string $id)
    {
        $this->trustedClientItemRepository->updateData($request, $id);
        Alert::success('Congratulation', 'Client Items Successfully Updated');
        return redirect()->back();
    }

    public function destroy(string $id)
    {
        $trustedClientItems = $this->trustedClientItemRepository->findById($id);
        $trustedClientItems->delete();
        Alert::success('Congratulation', 'Client Items Successfully Deleted');
        return redirect()->back();
    }
}
