<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\Event;
use App\Models\Donlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class DonationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        //$donates = Donation::all();
        //$events = Event::select('user_id','event_id')->where('user_id','=',$user_id->user_id)->where('event_id', '=', $participate->event_id)->get();
        $donates = DB::table('gproject.donations')->select('user_id','event_name','amount','proof','gproject.donations.created_at')
            ->join('gproject.events','donations.event_id','=','events.id')->get();
        return view('donate.list', compact('donates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $donates = Event::all();
        return view('donate.donate',compact('donates'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$request->validate([
            'event_name'=>'required',
            'event_location'=>'required',
            'event_description'=>'required',
            'event_image'=>'required',
            'event_date'=>'required'
        ]);*/
        $request->validate([
            'user_id'=>'required',
            'name'=>'required',
            'email'=>'required',
            'amount'=>'required',
            'proof'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:6144',
            'event_id'=>'required'
        ]);

        $fileName = "eventpic-" . time() . '.' . request()->proof->getClientOriginalExtension();

        $donate = new Donation([
            'user_id' => $request->get('user_id'),
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'amount' => $request->get('amount'),
            'proof' => $request->proof->storeAs('proof', $fileName),
            'event_id' => $request->get('event_id')
        ]);
        $donate->save();
        return redirect('user/donate')->with('success', 'Donation complete');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function show(Donation $donation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function edit(Donation $donation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Donation $donation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Donation $donation)
    {
        //
    }
}
