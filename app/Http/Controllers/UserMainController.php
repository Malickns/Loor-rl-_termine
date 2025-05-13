<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserMainController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request, UserController $userController)
    {
        return $userController->auth($request);
    }

    public function logout(UserController $userController)
    {
        return $userController->logout();
    }
}
