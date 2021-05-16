<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function adminHome(){
        return view('adminHome');
    }

    public function RegRequest(){
        $users = DB::table('users')->get();
        return view('RegRequest' , ['users' => $users]);
    }

    public function status(Request $request, $id){
        $data = User::find($id);
        if($data->status == 0) {
            $data->status = 1;
            $msg = "activated";
        }
        else {
            $data->status = 0;
            $msg = "deactivated";
        }
        $data->save();

        return Redirect::to('regrequest')->with('message', $data->name."'s account is ".$msg);
    }
}
