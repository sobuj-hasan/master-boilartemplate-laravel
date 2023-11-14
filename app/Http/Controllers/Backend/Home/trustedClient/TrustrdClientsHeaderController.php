<?php

namespace App\Http\Controllers\Backend\Home\trustedClient;

use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TrustedClient;
use App\Http\Requests\TrustedClientRequest;
use RealRashid\SweetAlert\Facades\Alert;
use App\Repositories\Interfaces\TrustedClientInterface;

class TrustrdClientsHeaderController extends Controller
{
    private $trustedClientRepository;

    public function __construct(TrustedClientInterface $trustedClientRepository)
    {
        $this->trustedClientRepository = $trustedClientRepository;
    }

    public function index()
    {
        $trusted_clients = $this->trustedClientRepository->all();
        return view('admin.pages.home.trusted-client.trusted_client_headers.index', ['trusted_clients' => $trusted_clients]);
    }

    public function store(TrustedClientRequest $request)
    {
        $this->trustedClientRepository->storeData($request);
        Alert::success('Congratulation', 'Header Successfully Created');
        return redirect()->back();
    }

    public function edit(string $id)
    {
        $trustedClient = $this->trustedClientRepository->findById($id);
        return Response::json($trustedClient);
    }

    public function update(TrustedClientRequest $request, string $id)
    {
        $this->trustedClientRepository->updateData($request, $id);
        Alert::success('Congratulation', 'Header Successfully Updated');
        return redirect()->back();
    }

    public function destroy(string $id)
    {
        $trustedClient = $this->trustedClientRepository->findById($id);
        $trustedClient->delete();
        Alert::success('Congratulation', 'Header Successfully Deleted');
        return redirect()->back();
        
    }
    public function active($id)
    {
        $this->trustedClientRepository->active($id);
        Alert::success('Congratulation', 'Header Successfully Activated');
        return redirect()->back();
    }

    public function deactive($id)
    {
        $active = $this->trustedClientRepository->deactive($id);
        if (!$active->is_active) {
            Alert::success('Congratulation', 'Header Successfully Deactivated');
            return redirect()->back();
        }
        Alert::warning('Oops !!', 'Header Is Already Deactive');
        return redirect()->back();
    }
}
