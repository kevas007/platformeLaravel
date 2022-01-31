<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use App\Http\Requests\StoreEntrepriseRequest;
use App\Http\Requests\UpdateEntrepriseRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class EntrepriseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $entreprises = Entreprise::where('users_id', Auth::user()->id)->get();
        if (count($entreprises) > 0) {
            return response()->json(
                [
                    'success' => true,
                    'data' => $entreprises,
                    'message' => "Données de l' entreprise récupérées avec succès"
                ],
                200
            );
        } else {
            return response()->json(
                [
                    'message' => 'Aucune entreprise trouvée Veuillez remplir votre profil'
                ],
            );
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEntrepriseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEntrepriseRequest $request)
    {
        $store = new Entreprise;
        // dd($request);
        $user = Auth::user();
        $store->users_id = $user->id;
        $store->numero_de_TVA = $request->numero_de_TVA;
        $store->nom_de_entreprise = $request->nom_de_entreprise;
        $store->activite_d_entreprise = $request->activite_d_entreprise;
        $store->adresse = $request->adresse;
        $store->ville = $request->ville;
        $store->pays = $request->pays;
        $store->numero_fixe = $request->numero_fixe;
        $store->code_postal = $request->code_postal;
        $store->email_de_la_personne_de_contact = $request->email_de_la_personne_de_contact;
        $store->numero_de_la_personne_de_contact = $request->numero_de_la_personne_de_contact;
        $store->nom_de_la_personne_de_contact = $request->nom_de_la_personne_de_contact;
        $store->save();
        // dd($store);
        return response()->json(
            [
                'success' => true,
                'message' => 'Entreprise créée avec succès',
                'data' => $store
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Entreprise  $entreprise
     * @return \Illuminate\Http\Response
     */
    public function show(Entreprise $entreprise)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Entreprise  $entreprise
     * @return \Illuminate\Http\Response
     */
    public function edit(Entreprise $entreprise)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEntrepriseRequest  $request
     * @param  \App\Models\Entreprise  $entreprise
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEntrepriseRequest $request, $id)
    {
        $update = Entreprise::find($id);
        $update->email_de_la_personne_de_contact = $request->email_de_la_personne_de_contact;
        $update->numero_de_la_personne_de_contact = $request->numero_de_la_personne_de_contact;
        $update->nom_de_la_personne_de_contact = $request->nom_de_la_personne_de_contact;
        $update->save();
        // dd($update);
        return response()->json(
            [
                'success' => true,
                'message' => 'Entreprise modifiée avec succès',
                'data' => $update
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Entreprise  $entreprise
     * @return \Illuminate\Http\Response
     */
    public function destroy(Entreprise $entreprise)
    {
        //
    }
}
