<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserPagesController extends Controller
{
    //
    public function index()
    {
        # code...
        return view('user.pages.home');
    }
}
