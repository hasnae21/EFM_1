<?php

namespace App\Http\Controllers;

use App\Models\CANDIDAT;
use Illuminate\Http\Request;

class CANDIDATController extends Controller
{

    public function store(Request $request)
    {
        // methode POST  
        // http://127.0.0.1:8000/api/forms
        // Question 1.2.3

        $CANDIDAT = CANDIDAT::where('email', $request->email)->get();

        if (!empty($CANDIDAT[0])) {
            $CANDIDAT_number = CANDIDAT::select('numero_dossier')->where('email', $request->email)->get();

            return [
                "validation" => "cet email exist déjà dans la base de donner",
                "numéro d’ordre de dossier de candidature" => $CANDIDAT_number
            ];
        } else {
            $request->validate(['idée' => 'required']);
            $form = CANDIDAT::create($request->all());

            return "votre idée est bien ajouter dans la base de donner";
        }
    }

    public function edit($id)
    {
        // methode GET   
        // http://127.0.0.1:8000/api/forms/{$numero_dossier}/edit
        // Question 4

        return CANDIDAT::select('idée', 'status_idée')->where('numero_dossier', $id)->get();
    }

    public function update(Request $request, CANDIDAT $form)
    {
        // methode PATCH   
        // http://127.0.0.1:8000/api/forms/{$numero_dossier}
        // Question 5.7

        return  $form->update($request->all());
    }

    public function index()
    {
        // methode GET  
        // http://127.0.0.1:8000/api/forms
        // Question 6.8.9

        $idées = CANDIDAT::select('numero_dossier', 'idée')->get();
        $idée_valid = CANDIDAT::select('numero_dossier', 'idée')->where('status_idée', '=', true)->get();
        $accept = $idée_valid->count();
        $idée_Non_valid = CANDIDAT::select('numero_dossier', 'idée')->where('status_idée', '=', false)->get();
        $refus = $idée_Non_valid->count();

        return [
            "les idées bonnes" => $idée_valid,
            "les idées refuser" => $idée_Non_valid,
            "nombre d'idées accepter" => $accept,
            "nombre d'idées refuser" => $refus,
            "Tous les idées" => $idées
        ];
    }

    public function destroy($id)
    {
        // methode DELETE   
        // http://127.0.0.1:8000/api/forms/{$numero_dossier}
        // Question 10

        $idée_Non_valid = CANDIDAT::where([['numero_dossier', $id], ['status_idée', '=', false]])->get();

        if (!empty($idée_Non_valid[0])) {
            CANDIDAT::where('numero_dossier', $id)->delete();

            return "l'idée invalid est bien suprimer";
        } else {
            return "impossible de suprimer l'idée car elle n'est pas invalid";
        }
    }

    public function show($id)
    {
        // methode GET   
        // http://127.0.0.1:8000/api/forms/{$numero_dossier}

        return CANDIDAT::all()->where('numero_dossier', $id);
    }

    public function create(Request $request)
    {
        // methode GET  
        // http://127.0.0.1:8000/api/forms/create
    }
}
