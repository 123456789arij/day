<?php

namespace App\Http\Controllers\Entreprise;

use App\Categorie;
use App\Client;
use App\Employee;
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
        /*   $categories = Categorie::all();
           return view('Entreprise.projet.create', compact('categories'));*/
    }


    public function home()
    {
//        $categories = Categorie::all();
        $projets = Projet::all();
        return view('Entreprise.projet.index', compact('projets'));
    }

    public function show(Projet $projet)
    {

        return view('Entreprise.projet.show', compact('projet'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categorie::all();
        $clients = Client::all();
        return view('Entreprise.projet.create', compact('clients', 'categories'));
        /*    $categories = Categorie::all();
            return view('Entreprise.projet.create', compact('categories'));*/
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*        $request->validate([
                    'name_categories' => 'required|string',
                ]);
                Categorie::create($request->all());
                return redirect()->route('projet.home')->with('success', ' Categorie is successfully saved');*/
        $request->validate([
            'name' => 'required',
            'description' => 'required',
//            'Categories_Id' => 'required',
            'file' => 'nullable',
            'Project_Status' => 'required',
            'start_date' => 'required|date',
            'Deadline' => 'required|date|after_or_equal:start_date',
            'id_client' => 'required',
        ]);
        /*     Projet>devis_id=Devis::where('nom',($request->input('devis')))->value('id');;
              $projet->responsable_id=Employe::where('nom',($request->input('responsable')))->value('id');*/
        Projet::create($request->all());
        return redirect()->route('projet.home')->with('toast_success', ' projet  is successfully saved');
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
    public function edit(Projet $projet)
    {
        $categories = Categorie::all();
        $clients = Client::all();
        return view('Entreprise.projet.edit', compact('projet', 'categories', 'clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Projet $projet)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
//            'Categories_Id' => 'required',
            'file' => 'nullable',
            'Project_Status' => 'required',
            'start_date' => 'required|date',
            'Deadline' => 'required|date|after_or_equal:start_date',
        ]);

        $projet->update($request->all());
        return redirect()->route('projet.home')->with('toast_success', 'projet is successfully updated');
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


    public function afficher_membre_projet()
    {
        $projet = Projet::findOrfail(2);
        $membres=$projet->employees;
        $employees = Employee::all();
        return view('Entreprise.projet.membre', compact('employees','membres'));
    }

    public function membre_projet(Request $request)
    {
        $emplyeeIds = $request->input('employee_id');
        $projetId = $request->input('projet_id');
        $projet = Projet::findOrfail(2);
        $projet->employees()->sync($emplyeeIds);
        return redirect()->route('projet.home')->with('toast_success', 'membre is successfully saved');
    }

    public function destroy_membre_projet(Projet $projet, $id_membre)
    {
        $membre = Projet::findOrFail($id_membre);
        $membre->delete();
        return redirect()->route('projet.home')->with('success', 'produit is successfully deleted');
    }


}
