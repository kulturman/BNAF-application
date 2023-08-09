<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;

class LoginListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     * @return void
     */
    public function handle(Login $event)
    {
        session('current_user', $event->user);
    }
}
