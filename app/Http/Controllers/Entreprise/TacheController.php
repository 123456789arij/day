<?php

namespace App\Http\Controllers\Entreprise;

use App\Http\Controllers\Controller;
use App\Projet;
use App\Tache;
use Illuminate\Http\Request;

class TacheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Entreprise.tache.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projets=Projet::all();
        $taches=Tache::all();
        return view('Entreprise.tache.create',compact('projets','taches'));
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
            'titre' =>'required',
            'description' =>'required',
            'projet_id' =>'required',
            'priorite' =>'required',
            'image_name'=>'required',
        ]);

     Tache::create($request-> all());
        return redirect()->route('tache.index')->with('success', '  Tache  is successfully saved');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // ------------------------ [ Upload Image ] --------------------------

    public function uploadImages(Request $request) {
        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        // Define upload path
        $destinationPath = public_path('images'); // upload path
        $image->move($destinationPath,  $imageName);

        /*    $data  =  Tache::create(['image_name' => $imageName]);*/
        // Save In Database
        $imagemodel= new Tache();
        $imagemodel->image_name=" $imageName";
        $imagemodel->save();

        return response()->json(['success'=> $imageName]);
    }

// --------------------- [ Delete image ] -----------------------------

    public function deleteImage(Request $request) {
        $image = $request->file('filename');
        $filename =  $request->get('filename').'.jpeg';
        Tache::where('image_name', $filename)->delete();
        $path = public_path().'/images/'.$filename;
        if (file_exists($path)) {
            unlink($path);
        }
        return $filename;
    }







}
