<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    use AuthorizesRequests;

    public function getRoles()
    {
        $this->authorize('sistfd/regra listar');
        $roles = Role::with('permissions')->where('name','LIKE',"%sistfd%")->get();
        return response()->json($roles, 200);
    }

    public function getPermissions()
    {
        $this->authorize('sistfd/regra listar');
        $permissions = Permission::with('roles')->where('name','LIKE',"%sistfd%")->get();
        return response()->json($permissions, 200);
    }
}
