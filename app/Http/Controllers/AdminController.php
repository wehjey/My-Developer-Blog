<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function dashboard(){
        $data = [
            'title' => 'Admin | My Developer Blog',
            'pageLabel' => 'Home'
        ];
        return view('admin.pages.dashboard',$data);
    }
}
