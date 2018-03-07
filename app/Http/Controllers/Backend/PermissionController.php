<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Http\Requests\PermissionRequest;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{

    public function __construct(Permission $permission)
    {
        $this->permission = $permission;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = $this->permission->get()->groupBy('table_name');

        return view('backend.permission.index',compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.permission.create');
    }

    /**
     * Create Category
     * @param PermissionRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PermissionRequest $request)
    {
        $property =  $request->all();

        try {

            $this->permission->create($property);

        } catch (\PDOException $exception) {

            return redirect()->back()->with('msgError', $exception->getMessage());

        }

        return redirect('backend/permission')->with('msgSuccess', 'Success !');
    }

    /**
     * Show
     * @param Permission $permission
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Permission $permission)
    {
        return view('backend.permission.edit',compact('permission'));
    }

    /**
     * Edit
     * @param Permission $permission
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Permission $permission)
    {
        return view('backend.permission.edit',compact('permission'));
    }

    /**
     * Update
     * @param PermissionRequest $request
     * @param Permission $permission
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PermissionRequest $request, Permission $permission)
    {
        $property = $request->only(['display_name', 'description','table_name']);

        // try update
        try {
            $permission->update($property);
        } catch(\PDOException $exception) {
            return redirect()->back()->with('msgError', $exception->getMessage());
        }

        return redirect('backend/permission')->with('msgSuccess',__('backend.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


}
