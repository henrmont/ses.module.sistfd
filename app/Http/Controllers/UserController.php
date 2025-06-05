<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class UserController extends Controller
{
    use AuthorizesRequests;

    public function getUsers()
    {
        $this->authorize('sistfd/usuário listar');
        $users = User::with(['modules','roles'])->whereHas('modules', function($q) {
            $q->where('name', 'sistfd');
        })->where('id','<>',1)->where('id','<>',auth()->user()->id)->orderBy('created_at','desc')->get();
        return response()->json($users, 200);
    }
}
