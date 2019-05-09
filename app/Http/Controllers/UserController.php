<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user=User::paginate(5);

        return view('home', compact('socio'));
    }
    
    public function show(User $socio)
    {
        $pagetitle = "Show socio";
        /*
        $user = User::findOrFail($user);
        */
        return view('home', compact('pagetitle', 'socio'));
    }

    public function create(User $socio)
    {
        $pagetitle = "Add socio";
        return view('users.create', compact('pagetitle'));
    }

    public function getfile(User $id) {
        
        return $path= $socio->foto_url;
    }   

    public function edit(User $socio)
    {
        $pagetitle = "Show and edit socio";
        /*
        $user = User::findOrFail($user);
        */
        return view('users.edit', compact('pagetitle', 'socio'));
    }

    public function update(Request $request, $id)
    {
        if ($request->has('cancel')) 
        {
            return redirect()->action('UserController@index');
        }

        $user = $request->validate([
            'name' => 'required|regex:/^[\pL\s]+$/u',
            'age' => 'required|integer|between:1,120',
        ], [ // Custom Messages
            'name.regex' => 'Name must only contain letters and spaces.',
        ]);

        $userModel = User::findOrFail($id);
        $userModel->fill($user);
        $userModel->save();
        return redirect()->action('UserController@index');
    }

}


