<?php

namespace App\Listeners;

use App\User;
use Exception as ExceptionAlias;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UserCacheListener
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
     *
     * @param object $event
     * @return void
     * @throws ExceptionAlias
     */
    public function handle($event)
    {
        cache()->forget('users');

        $users = User::all();

        cache()->forever('users', $users);
    }
}
