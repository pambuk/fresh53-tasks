<?php

namespace App\Listeners;

use App\Fresh\ConfirmationTokensService;
use App\Mail\ConfirmRegistration;
use Illuminate\Auth\Events\Registered;
use Illuminate\Mail\Mailer;

class EmailRegisteredUser
{
    /**
     * @var Mailer
     */
    private $mailer;
    /**
     * @var ConfirmationTokensService
     */
    private $tokens;

    /**
     * Create the event listener.
     * @param Mailer $mailer
     * @param ConfirmationTokensService $tokens
     */
    public function __construct(Mailer $mailer, ConfirmationTokensService $tokens)
    {
        $this->mailer = $mailer;
        $this->tokens = $tokens;
    }

    /**
     * Handle the event.
     *
     * @param  Registered $event
     * @return void
     */
    public function handle(Registered $event)
    {
        $this->mailer->send(
            new ConfirmRegistration($event->user, $this->tokens->setUser($event->user)->getNew())
        );
    }
}
