<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;

class ChangePassword extends Controller
{
    public function index(ChangePasswordRequest $request)
    {
        $user = \Auth::authenticate();
        $user->password = $request->input('new');
        $user->save();

        return response()->json(true);
    }
}