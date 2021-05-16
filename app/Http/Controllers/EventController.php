<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        return view('events.index', compact('events'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'event_name'=>'required',
            'event_description'=>'required',
            'participants'=>'required'
        ]);

        $event = new Event([
            'event_name' => $request->get('event_name'),
            'event_description' => $request->get('event_description'),
            'participants' => $request->get('participants')
        ]);
        $event->save();
        return redirect('/events')->with('success', 'Event Created');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::find($id);
        return view('events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'event_name'=>'required',
            'event_description'=>'required',
            'participants'=>'required'
        ]);

        $event = Event::find($id);
        $event->event_name =  $request->get('event_name');
        $event->event_description = $request->get('event_description');
        $event->participants = $request->get('participants');
        $event->save();

        return redirect('/events')->with('success', 'Event updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event, $id)
    {
        $event = Event::find($id);
        $event->delete();

        return redirect('/events')->with('success', 'Event Cancelled');

    }
}
