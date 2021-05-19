<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Participate;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        /*$register = $request->session()->get('events');

        if(!isset($register->productImg)) {
            $request->validate([
                'event_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:12048',
            ]);
            $fileName = "productImage-" . time() . '.' . request()->productimg->getClientOriginalExtension();
            $request->productimg->storeAs('productimg', $fileName);
            $register = $request->session()->get('events');
            $register->productImg = $fileName;
            $request->session()->put('events', $register);
        }*/
        /*if ($request->hasFile('event_image')){
            $image = $request->file('event_image');
            $fileName   = time() . '.' . $image->getClientOriginalExtension();
            $img = Image::make($image->getRealPath());
            $img->resize(120, 120, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->stream();
            Storage::disk('local')->put('images/1/smalls'.'/'.$fileName, $img, 'public');
        }*/

        $request->validate([
            'event_name'=>'required',
            'event_location'=>'required',
            'event_description'=>'required',
            'event_image'=>'required',
            'event_date'=>'required'
        ]);

        $event = new Event([
            'event_name' => $request->get('event_name'),
            'event_location' => $request->get('event_location'),
            'event_description' => $request->get('event_description'),
            'event_image' => $request->get('event_image'),
            'event_date' => $request->get('event_date')
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
            'event_location'=>'required',
            'event_description'=>'required',
            'event_image'=>'required',
            'event_date'=>'required'
        ]);

        $event = Event::find($id);
        $event->event_name =  $request->get('event_name');
        $event->event_location = $request->get('event_location');
        $event->event_description = $request->get('event_description');
        $event->event_image = $request->get('event_image');
        $event->event_date = $request->get('event_date');
        $event->save();

        return redirect('/events')->with('success', 'Event updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::find($id);
        $event->delete();

        return redirect('/events')->with('success', 'Event Cancelled');

    }
}
