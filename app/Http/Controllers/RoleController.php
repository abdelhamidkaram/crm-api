<?php

namespace App\Http\Controllers;

use Crm\User\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function all()
    {
      return Role::all();
    }
    public function show($id)
    {
      return Role::find($id);
    }
    public function create(Request $request)
    {
      return Role::create(['name'=>$request->name , 'guard_name'=>'web']);
    }
    public function addPermission(Request $request , $id)
    {
       Role::find($id)->givePermissionTo($request->permissions);
       return response()->json(['message'=>'success']);
    }
    public function update(Request $request , $id)
    {
       Role::find($id)->update(['name'=>$request->name]);
       return response()->json(['message'=>'success']);

    }
    public function delete($id)
    {
       Role::find($id)->delete();
       return response()->json('deleted');
    }
    public function addRoleToUser($id,$UserId)
    {
       User::find($UserId)->assignRole($id);
       return response()->json('success');
    }


    public function deletePermissionFormRol($id,$permissionId)
    {
       Role::find($id)->revokePermissionTo($permissionId);
       return response()->json('success');
    }







}
