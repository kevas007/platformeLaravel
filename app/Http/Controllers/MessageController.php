<?php

namespace App\Http\Controllers;

use App\Events\WebsocketDemoEvent;
use App\Models\Message;
use App\Http\Requests\StoreMessageRequest;
use App\Http\Requests\UpdateMessageRequest;
use App\Models\Entreprise;
use App\Models\User;
use App\Notifications\InvoicePaid;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification as FacadesNotification;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //     $entreprises  = DB::table('entreprises')
        //     ->join('messages', 'entreprises.id', '=', 'messages.entreprise_id')
        //     ->orderBy('messages.created_at', 'asc')
        //     ->get();


        // // dd($entreprises);
        // return view('backend.partials.messages', compact('entreprises'));
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
     * @param  \App\Http\Requests\StoreMessageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMessageRequest $request, $id)
    {

        $store = new Message;
        // dd($request->all());
        $store->entreprise_id = $id;
        $store->message = $request->message;
        $store->user_id = Auth::user()->id;
        $store->save();
        // dd($store);
        if(Auth::user()->id ==1){
            $entreprise = Entreprise::find($id);
            broadcast(new WebsocketDemoEvent($store));
            FacadesNotification::send( $entreprise->users, new InvoicePaid($store));
            return redirect()->back();
        }else{
            broadcast(new WebsocketDemoEvent($store));
            FacadesNotification::send(User::find(1), new InvoicePaid($store));

            return response()->json(['success' => 'Message sent successfully.', 'data' => $store]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // dd(Auth::user());
        $entreprises =Entreprise::find($id);
        $messages= $entreprises->messages()->orderBy('created_at')->get();
        $user= Auth::user()->id;
        // broadcast(new WebsocketDemoEvent())
        return view('backend.partials.messages', compact( 'messages', 'entreprises', "user"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMessageRequest  $request
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMessageRequest $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }
    public function massages()
    {
        $messages =DB::table('entreprises')
        ->join('messages', 'entreprises.id', '=', 'messages.entreprise_id')
        ->where('entreprises.id', Auth::user()->entreprises->id)
        ->orderBy('messages.created_at')
        ->get();

        // $messages= $entreprises->messages()->orderBy('created_at')->get();
        // $messages = Message::where('entreprise_id', $id)->get();
        //  dd($messages);
        return response()->json([
            'messages' => $messages,
        ]);
    }
}
