<?php

namespace App\Http\Controllers;

use App\Models\User;
// use Illuminate\View\View;

class UserController extends Controller
{
    public function show(string $id)
    {
        return view('user.profile',[
            'user' => User::findOrFail($id)
        ]);
    }
    // public function __construct()
    // {
    //     $this->middleware('auth');
    //     $this->middleware('log')->only('index');
    //     $this->middleware('subscribed')->except('store');
    // }
}