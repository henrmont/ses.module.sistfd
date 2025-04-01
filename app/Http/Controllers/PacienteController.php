<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class PacienteController extends Controller
{
    use AuthorizesRequests;

    public function getPacientes(Request $request)
    {
        $user = User::find(auth()->user()->id);
        $this->authorize('sistfd - list');
        return response()->json($user->load('permissions'), 200);
    }
}
