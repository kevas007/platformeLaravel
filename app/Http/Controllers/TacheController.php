<?php

namespace App\Http\Controllers;

use App\Models\Tache;
use App\Http\Requests\StoreTacheRequest;
use App\Http\Requests\UpdateTacheRequest;
use App\Models\Entreprise;
use Illuminate\Support\Facades\DB;

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
        return view('backend.partials.todos.taches', compact('taches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $entreprises= Entreprise::all();
        return view('backend.partials.todos.todos', compact('entreprises'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTacheRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTacheRequest $request)
    {
        $request->validated(
            [
                'nom' => 'required|string|max:255',
                'description' => 'required|string|max:255',
                // 'statut_tache_id' => 'required|exists:statut_taches,id',
                'entreprises_id' => 'required|exists:entreprises,id',
            ]
        );


        $store =  new Tache;
        $store->entreprises_id = $request->entreprises_id;
        $store->nom = $request->nom;
        $store->description = $request->description;
        $store->statut_taches_id = 1;

        $store->save();
        // dd($store);
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tache  $tache
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tache  $tache
     * @return \Illuminate\Http\Response
     */
    public function edit(Tache $tache)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTacheRequest  $request
     * @param  \App\Models\Tache  $tache
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTacheRequest $request, Tache $tache)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tache  $tache
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tache $tache)
    {
        //
    }
    public function shows($id){
        $taches = DB::table('taches')
        ->join('entreprises', 'taches.entreprises_id', '=', 'entreprises.id')
        ->join('statut_taches', 'taches.statut_taches_id', '=', 'statut_taches.id')
        ->where ('entreprises.id', '=', $id)
        ->orderBy('taches.nom', 'desc')
        ->get();


        return view('backend.partials.todos.todoShow', compact('taches'));
    }
}
