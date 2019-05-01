<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index($id)
    {
        $user = User::findOrFail($id);

        $pagetitle = "User";
        
        return view('home', compact('user', 'pagetitle'));
    }
}
