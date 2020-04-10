<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Tache;
use Illuminate\Http\Request;

class FullCalendarController extends Controller
{

    public function index()
    {
        $tasks = Tache::get();
        return view('Entreprise.tache.fullcalender', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        Tache::create($request->all());
        return redirect()->route('tasks.index');
    }

}
