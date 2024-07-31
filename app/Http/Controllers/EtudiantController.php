<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etudiant;

class EtudiantController extends Controller
{
    public function list_etudiant()
    {
        $etudiants = Etudiant::all();
        return view ('etudiant.liste', compact('etudiants'));
    }
    public function ajouter_etudiant()
    {
        return view ('etudiant.ajouter');
    }

    public function ajouter_etudiant_traitement (Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'classe' => 'required|string|max:255'
        ]);
        $etudiant = new Etudiant();
        $etudiant->nom = $request->nom;
        $etudiant->prenom = $request->prenom;
        $etudiant->classe = $request->classe;
        $etudiant->save();

        return redirect('/ajouter')->with('status','ENVOYEZ');

    }
}