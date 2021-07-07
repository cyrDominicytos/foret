<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DemandeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
        $this->middleware('web');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function liste($details)
    {
        
        return view('/liste_demandes',  ['details' => $details]);
    }
}
