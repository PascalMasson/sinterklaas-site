<?php

namespace App\Traits;

use Illuminate\Support\Facades\Session;

trait UseLoggedInUser
{

    public function getLoggedInUser()
    {
        return Session::get('loggedInUser');
    }

    public function getLoggedInUserId()
    {
        return Session::get('loggedInUser')->id;
    }

    public function getLoggedInUserName()
    {
        return Session::get('loggedInUser')->name;
    }

    public function setLoggedInUser($user)
    {
        Session::put('loggedInUser', $user);
    }
}
