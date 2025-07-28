<?php

namespace App\Http\Controllers;

use App\Models\User;
abstract class Controller
{

public function adminDashboard()
{
    $userCount = User::count();

    return view('admin-dashboard', ['userCount' => $userCount]);
}

}
<<<<<<< HEAD
=======


>>>>>>> origin/merged-anushree
