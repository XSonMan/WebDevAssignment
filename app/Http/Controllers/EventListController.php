<?php

namespace App\Http\Controllers;

use App\Models\Event;
//use App\Models\Participate;
use App\Models\Participate;
use Illuminate\Http\Request;

class EventListController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $participate = new Participate([
            'user_id' => $request->get('user_id'),
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'event_id' => $request->get('event_id')
        ]);
        $participants = Participate::select('user_id','event_id')->where('user_id','=',$participate->user_id)->where('event_id', '=', $participate->event_id)->get();
        if($participants != "[]"){
            return redirect('/list')->with('success', "You are already registered to this event");
        }
        else{
            $participate->save();
            return redirect('/list')->with('success', 'Successfully registered');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EventList  $eventList
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::find($id);
        $participants = Participate::select('name')->where('event_id',$id)->get();
        return view('lists.view', compact('event','participants'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EventList  $eventList
     * @return \Illuminate\Http\Response
     */
    public function edit(EventList $eventList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EventList  $eventList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EventList $eventList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EventList  $eventList
     * @return \Illuminate\Http\Response
     */
    public function destroy(EventList $eventList)
    {
        //
    }
}
