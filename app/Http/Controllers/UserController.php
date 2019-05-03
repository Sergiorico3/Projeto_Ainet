<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user=User::paginate(5);

        return view('home', compact('user'));
    }
    
    public function show(User $user)
    {
        $pagetitle = "Show user";
        /*
        $user = User::findOrFail($user);
        */
        return view('home', compact('pagetitle', 'user'));
    }

    public function create(User $socio)
    {
        
    }

   

}


