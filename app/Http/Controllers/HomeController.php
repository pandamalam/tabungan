<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->whereHasNot('masuk')) {
            $b = Auth::user()->keluar->all();
            $a = Auth::user()->masuk->all();

        }
        elseif (Auth::user()->whereHasNot('keluar')) {
            $a = Auth::user()->masuk->all();
            $b = Auth::user()->keluar->all();

        }
        elseif (Auth::user()->keluar && Auth::user()->masuk) {
            $a = Auth::user()->masuk->all();
        $b = Auth::user()->keluar->all();

        }
        else{
            $c = "Anda Belum Punya Data Keuangan";
         }
        return view('home', compact('a','b'));
    }
}
