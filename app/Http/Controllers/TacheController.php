<?php

namespace App\Http\Controllers;

use App\Events\Todos;
use App\Models\Tache;
use App\Http\Requests\StoreTacheRequest;
use App\Http\Requests\UpdateTacheRequest;
use App\Models\Entreprise;
use App\Notifications\TodosNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification as FacadesNotification;


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
        $entreprises = Entreprise::all();
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
        $store->statut = false;

        $store->save();
        // $entreprise = Entreprise::find($id);
        // dd($store);
        // Notification::send( Auth::user(),new TodosNotification($store));
        broadcast(new Todos($store));
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
        $tache = Tache::find($tache->id);
        return response()->json($tache);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTacheRequest  $request
     * @param  \App\Models\Tache  $tache
     * @return \Illuminate\Http\Response
     */
    public function update($id,UpdateTacheRequest $request)
    {

        $update = Tache::find($id);
        $update->statut = $request->statut;
        $update->save();
        return response()->json(['success' => 'Record is successfully updated']);
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
    public function shows($id)
    {
        $taches = DB::table('taches')
            ->join('entreprises', 'taches.entreprises_id', '=', 'entreprises.id')
            ->where('entreprises.id', '=', $id)
            ->orderBy('taches.nom', 'desc')
            ->get();



        return view('backend.partials.todos.todoShow', compact('taches'));
    }

    public function showTache()
    {
        // dd(Auth::user()->id);
        $taches = DB::table('taches')
            ->join('entreprises', 'taches.entreprises_id', '=', 'entreprises.id')
            ->select('taches.*')
            ->where('entreprises.id', '=', Auth::user()->entreprises->id)
            ->orderBy('taches.nom', 'desc')
            ->get();
            // dd($taches);
        if (count($taches) > 0) {
            return response()->json([
                'taches' => $taches,
                'message' => 'taches retrieved successfully'

            ], 200);
        } else {
            return response()->json([
                'taches' => $taches,
                'message' => 'Aucune tache trouvée'
            ], 200);
        }
    }
}
