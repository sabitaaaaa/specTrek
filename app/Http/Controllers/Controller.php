<?php

namespace App\Http\Controllers;
<<<<<<< HEAD
use App\Models\User;
abstract class Controller
{

public function adminDashboard()
{
    $userCount = User::count(); 

    return view('admin-dashboard', ['userCount' => $userCount]);
}

} 



=======

abstract class Controller
{
    //
}
>>>>>>> feature/trekking-mapp
