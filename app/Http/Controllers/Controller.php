<?php

namespace App\Http\Controllers;
abstract class Controller
{
    //
}

use App\Models\User;
abstract class Controller
{

public function adminDashboard()
{
    $userCount = User::count();

    return view('admin-dashboard', ['userCount' => $userCount]);
}

}



