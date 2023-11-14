<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RolePermissionRequest;
use App\Repositories\Interfaces\RolePermissionRepositoryInterface;

class RoleController extends Controller
{
    private $rolepermissionrepository;

    public function __construct(RolePermissionRepositoryInterface $rolepermissionrepository)
    {
        $this->rolepermissionrepository = $rolepermissionrepository;
        $this->middleware('can:Role List Page', ['only' => ['index']]);
        $this->middleware('can:Role Create', ['only' => ['create']]);
        $this->middleware('can:Role Edit', ['only' => ['edit']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $role = $this->rolepermissionrepository->rollAll();
        return view('admin.pages.role.role-view', compact('role'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissionsAll = $this->rolepermissionrepository->permissionAll();
        $permissionsGroup = User::getpermissiongroup();
        return view('admin.pages.role.role-create', compact('permissionsAll', 'permissionsGroup'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RolePermissionRequest $request)
    {
        $this->rolepermissionrepository->storeData($request);
        return redirect()->route('role.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = $this->rolepermissionrepository->findId($id);
        $permissionsAll = $this->rolepermissionrepository->permissionAll();
        $permissionsGroup = User::getpermissiongroup();
        return view('admin.pages.role.role-edit', compact('role', 'permissionsAll', 'permissionsGroup'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->rolepermissionrepository->updateData($request, $id);
        return redirect()->route('role.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $role = $this->rolepermissionrepository->findId($id);
            if (!is_null($role)) {
                $role->delete();
            }
            // Alert::success('success', 'Role successfully deleted');
            return redirect()->route('role.index');
        } catch (\Illuminate\Database\QueryException $e) {
            $errorCode = $e->getCode();

            if ($errorCode === '23000') {
                // Foreign key constraint violation
                // Alert::error('error', 'Cannot delete or update the record due to a foreign key constraint.');
            } else {
                // Other database-related errors
                // Alert::error('error', 'An error occurred while processing the request.');
            }
            return back();
        }
    }
}
