<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{

    public function loginRequest(AuthRequest $request)
    {

        $data = [
            "phone" => $request->phone,
            "password" => $request->password
        ];


        if (Auth::attempt($data)) {
            return redirect('admin');
        }
        return redirect("login");
    }

}
