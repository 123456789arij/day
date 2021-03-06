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
        $taches = Tache::all();
        return view('Entreprise.tache.index',compact('taches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projets = Projet::all();
        $taches = Tache::all();
        return view('Entreprise.tache.create', compact('projets', 'taches'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required',
            'description' => 'required',
            'projet_id' => 'required',
            'priorite' => 'required',
//            'file_name' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
//            'image_name'=>'required|mimes:jpeg,png,jpg,bmp|max:2048',
        ]);
        // if validation fails
/*        if ($request->fails()) {
            return back()->withErrors($request->errors());
        }
        // if validation success
        if ($request->hasFile('file_name')) {
            // Get filename with the extension
            $filenameWithExt = $request->file('file_name')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('file_name')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            // Upload Image
            $path = $request->file('file_name')->storeAs('public/file_name', $fileNameToStore);
        }*/

        Tache::create($request->all());
        return redirect()->route('tache.index')->with('toast_success', '  Tache  is successfully saved');
    }


    /*    public function uploadImages(Request $request) {
            $image = $request->file('file');
            $imageName = $image->getClientOriginalName();
            // Define upload path
            $destinationPath = public_path('images'); // upload path
            $image->move($destinationPath,  $imageName);
            // Save In Database
            $imagemodel= new Tache();
            $imagemodel->image_name=" $imageName";
            $imagemodel->save();

            return response()->json(['success'=> $imageName]);
        }*/

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tache $tache)
    {
        return view('Entreprise.tache.edit', compact('tache'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Tache $tache)
    {
        $request->validate([
            'titre' => 'required',
            'description' => 'required',
            'projet_id' => 'required',
            'priorite' => 'required',
//            'file_name' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);
/*        switch($request->get('priorite'))
        {
            case 0:
                Tache::moyenne($tache);
                break;
            case 1:
               Tache::facile($tache);
                break;
            case 2:
               Tache::difficile($tache);
                break;

            default:
                break;

        }*/
        $tache->update($request->all());
        return redirect()->route('Entreprise.tache.index')->with('toast_success', 'tache is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tache $tache)
    {
        $tache->delete();
        return redirect()->route('tache.index')->with('toast_success', 'tache  is successfully deleted');
    }

    // ------------------------ [ Upload Image ] --------------------------


// --------------------- [ Delete image ] -----------------------------

    public function deleteImage(Request $request)
    {
        $image = $request->file('filename');
        $filename = $request->get('filename') . '.jpeg';
        Tache::where('image_name', $filename)->delete();
        $path = public_path() . '/images/' . $filename;
        if (file_exists($path)) {
            unlink($path);
        }
        return $filename;
    }


}
