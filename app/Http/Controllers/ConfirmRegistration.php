<?php

namespace App\Http\Controllers;

use App\Fresh\ConfirmationTokensService;
use App\User;

class ConfirmRegistration extends Controller
{
    /**
     * @param $token
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function index($token)
    {
        try {
            /** @var User $user */
            $user = (new ConfirmationTokensService())->getUser($token);
            $user->activate();
            \Auth::login($user);
            $response = redirect('home');
        } catch (\Exception $e) {
            \Session::flash('error', 'Sorry, activation link is invalid');
            $response = redirect('/');
        }

        return $response;
    }
}
