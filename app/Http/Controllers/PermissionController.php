<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{

    public function index()
    {
        $permissionData = Permission::all();
        return view('user_permission.index', compact('permissionData'));
    }


    public function create()
    {
        $userRoles = Role::get()->pluck('name','id');
        return view('user_permission.create', compact('userRoles'));
    }


    public function store(Request $request)
    {

        $validator = \Validator::make(
            $request->all(), [
                'title' => 'required',
            ]
        );
        if ($validator->fails()) {
            $messages = $validator->getMessageBag();
            return redirect()->back()->with('error', $messages->first());
        }

        $userPermission = new Permission();
        $userPermission->name = $request->title;
        $userPermission->save();

        if (!empty($request->user_roles)) {
            foreach ($request->user_roles as $userRole) {
                $role = Role::find($userRole);
                $permission = Permission::where('name', $request->title)->first();
                $role->givePermissionTo($permission);
            }
        }
        return redirect()->back()->with('success', 'Permission successfully created.');
    }


    public function destroy($id)
    {
        $permission = Permission::find($id);
        $permission->delete();
        return redirect()->back()->with('success', 'Permission successfully deleted.');
    }
}
