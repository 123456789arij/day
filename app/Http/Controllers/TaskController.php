<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
//        dd(auth()->guard('employee')->user());
        return 'hello';
    }
}
