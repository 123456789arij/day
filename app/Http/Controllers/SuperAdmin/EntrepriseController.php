<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Gate;
class EntrepriseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::select('select * from users where role_id = :id', ['id' => 1]);
        return view('superAdmin.Entreprise.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Gate::denies('edit-Entreprise')){
            redirect()->route('superAdmin.Entreprise.index');
        }
        return view('SuperAdmin.Entreprise.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' =>'required',
            'email' =>'required',
            'password' => 'required', 'string', 'min:6',
         // 'role_id'=>'required',
        ]);

        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'role_id'=>'1',
        ]) ;
        return redirect()->route('superAdmin.Entreprise.index')->with('success', '  Entreprise is successfully saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if(Gate::denies('edit-Entreprise')){
            redirect()->route('superAdmin.Entreprise.index');
        }
        return view('superAdmin.Entreprise.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // $hashed = Hash::make('password');
        $request->validate([
            'nom' =>'required',
            'email' =>'required',
            'password' => 'required', 'string', 'min:6',
        ]);

        $user->update($request->all());
        return redirect()->route('superAdmin.Entreprise.index')->with('success', 'Entreprise is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user ,$id)
    {

        if(Gate::denies('destroy-Entreprise')){
            redirect()->route('superAdmin.Entreprise.index');
            }
        $user= User::findOrFail($id);
     if($user ->delete())
     {
         return redirect()->route('superAdmin.Entreprise.index')->with('success', 'Entreprise is successfully deleted');
        }
     return back()->withInput()->with('error','Entreprise can not be deleted');
}







}

