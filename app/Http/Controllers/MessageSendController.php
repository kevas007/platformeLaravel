<?php

namespace App\Http\Controllers;

use App\Models\MessageSend;
use App\Http\Requests\StoreMessageSendRequest;
use App\Http\Requests\UpdateMessageSendRequest;

class MessageSendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreMessageSendRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMessageSendRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MessageSend  $messageSend
     * @return \Illuminate\Http\Response
     */
    public function show(MessageSend $messageSend)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MessageSend  $messageSend
     * @return \Illuminate\Http\Response
     */
    public function edit(MessageSend $messageSend)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMessageSendRequest  $request
     * @param  \App\Models\MessageSend  $messageSend
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMessageSendRequest $request, MessageSend $messageSend)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MessageSend  $messageSend
     * @return \Illuminate\Http\Response
     */
    public function destroy(MessageSend $messageSend)
    {
        //
    }
}
