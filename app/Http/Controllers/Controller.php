<?php

namespace App\Http\Controllers;
<<<<<<< HEAD

abstract class Controller
{
    //
}
=======
use App\Models\User;
abstract class Controller
{

public function adminDashboard()
{
    $userCount = User::count(); 

    return view('admin-dashboard', ['userCount' => $userCount]);
}

} 



>>>>>>> feature-admin
