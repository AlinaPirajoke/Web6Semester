<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegisteredUserController extends Controller
{
    public function checkUniqueLogin(Request $request) {
        // dd($request);
        // $request->validate([
        //     'login' => 'required|string'
        // ]);
        $login = $request->input('login');

        return response()->json([
            'data' => [
                'is_unique' => !User::query()->whereLogin($login)->exists()
            ]
        ]);

    }

}
