<?php

namespace App\Http\Controllers;
<<<<<<< HEAD
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

=======
use App\Models\User;
>>>>>>> feature-admin
abstract class Controller
{

public function adminDashboard()
{
    $userCount = User::count(); 

    return view('admin-dashboard', ['userCount' => $userCount]);
}
<<<<<<< HEAD
>>>>>>> feature/trekking-mapp
=======

} 



>>>>>>> feature-admin
