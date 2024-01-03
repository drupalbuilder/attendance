<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    // use AuthenticatesUsers;

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

    public function index() {
        return view('auth.login');
    }

    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password', 'status');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if (\Gate::allows('isAdmin')) {

                $this->redirectTo = 'admin/dashboard';
                return redirect()->intended('admin/dashboard');
            } else if (\Gate::allows('isManager')) {

                $this->redirectTo = 'admin/dashboard';
                return redirect()->intended('admin/dashboard');
            } else if (\Gate::allows('isDealer')) {

                $this->redirectTo = 'admin/dashboard';
                return redirect()->intended('admin/dashboard');
            } else if (\Gate::allows('isAgent')) {

                $this->redirectTo = 'admin/dashboard';
                return redirect()->intended('admin/dashboard');
            } else {
                // for future need
            }
        } else {
            $this->redirectTo = '/';
            return redirect('/')->withErrors('Invalid email or password');
        }
    }

    public function authcheck() {

        if(Auth::check()) {
            $user = Auth::user();
            if (\Gate::allows('isAdmin')) {
                $this->redirectTo = 'admin/dashboard';
                return redirect()->intended('admin/dashboard');
            } else if (\Gate::allows('isManager')) {
                $this->redirectTo = 'admin/dashboard';
                return redirect()->intended('admin/dashboard');
            } else if (\Gate::allows('isDrealer')) {
                $this->redirectTo = 'admin/dashboard';
                return redirect()->intended('admin/dashboard');
            }  else if (\Gate::allows('isAgent')) {
                $this->redirectTo = 'admin/dashboard';
                return redirect()->intended('admin/dashboard');
            } else {
                // for future need
            }
        } else {
            $this->redirectTo = '/';
            return redirect('/');
        }
    }
}
