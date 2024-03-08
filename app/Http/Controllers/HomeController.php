<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller 
{
    public function oo()
    {
        if(Auth::check())
        {
            $usertype = Auth()->user()->usertype;
            if($usertype == 'user')
            {
                return view('dashboard');
            }
            else if($usertype == 'admin')
            {
                return redirect()->route('admin.admin'); // Redirect to admin route
            }
            else
            {
                return redirect()->back();
            }
        }
        else
        {
            return redirect()->route('login'); // Redirect to login page if user is not logged in
        }
    }
}
