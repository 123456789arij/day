<?php

namespace App\Http\Controllers\Entreprise;

use App\Categorie;
use App\Http\Controllers\Controller;
use App\Projet;
use Illuminate\Http\Request;

class ProjetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //  return view('Entreprise.projet.create',compact('categories'));
        // return view('Entreprise.projet.index');
    }


    public function home()
    {
        return view('Entreprise.projet.index');
    }

    /*   public function show()
       {
           $categories=Categorie::all();
           return view('Entreprise.projet.create',compact('categories'));
       }*/

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categorie::all();
        return view('Entreprise.projet.create', compact('categories'));
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
            'name_categories' => 'required|string',
        ]);
        //  dd($request);
        /*    $categories= new Categorie();
             $categories->name_categories = $request ->name_categories;
             $categories->save();*/
        Categorie::create($request->all());
        return redirect()->route('projet.home')->with('success', ' Categorie is successfully saved');
    }

    public function afficher(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'Categories_Id' => 'required',
        ]);
        Projet::create($request->all());
        return redirect()->route('projet.home')->with('success', ' projet  is successfully saved');
    }



    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categorie $categories, $id)
    {
        $categories = Categorie::findOrFail($id);
        $categories->delete();
        return redirect()->route('projet.home')->with('success', 'produit is successfully deleted');
    }
}
