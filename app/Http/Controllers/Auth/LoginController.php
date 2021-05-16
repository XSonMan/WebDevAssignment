<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers {
            logout as performLogout;
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function logout(Request$request){
        $this->performLogout($request);
        return redirect()->route('login');
    }

    protected function login(Request $request)
    {

        $errors = [$this->username() => trans('auth.failed')];

        $user = User::where($this->username(), $request->{$this->username()})->first();

        if($user && Hash::check($request->password, $user->password ) && $user->status == 1){
            $input = $request->all();

            $this->validate($request, [
                'email' => 'required|email',
                'password' => 'required',
            ]);

            if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
            {
                if (auth()->user()->is_admin == 1) {
                    return redirect()->route('admin.home');
                }else{
                    return redirect()->route('home');
                }
            }else{
                return redirect()->route('login')->with('error','Email-Address And Password Are Wrong.');
            }
        }
        else{
            $errors = [$this->username()=> 'Account is not activated. Contact an Admin to activate account.'];

            if($request->expectsJson()){
                return Response()->json($errors,422);
            }
            return redirect()->back()->withInput($request->only($this->username(), 'remember'))->withErrors($errors);
        }

    }

}
