<?php
namespace App\Fresh;

use App\ConfirmationToken;
use App\User;

class ConfirmationTokensService
{
    private $user;

    /**
     * @param User $user
     * @return $this
     */
    public function setUser(User $user)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return string
     */
    public function getNew()
    {
        $confirmation = new ConfirmationToken();
        $confirmation->token = md5($this->user->id . time());
        $confirmation->user_id = $this->user->id;
        $confirmation->save();

        return $confirmation->token;
    }

    public function getUser($token)
    {
        $confirmation = ConfirmationToken::where('token', $token)->first();
        $user = $confirmation->user;
        $confirmation->delete();

        return $user;
    }
}