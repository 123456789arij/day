<?php

namespace App\Http\Controllers\employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
      // dd(auth()->guard('employee')->user());
        return view ('employee.tache.index');
    }
}
