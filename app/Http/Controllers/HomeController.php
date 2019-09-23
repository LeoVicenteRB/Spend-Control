<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
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
        Session::put('user_id', Auth::user()->id);
        return redirect()->route('dashboard.index');
    }

    public function sair(){
      Auth::logout();
      return redirect()->route('home.index');
    }
    
}
