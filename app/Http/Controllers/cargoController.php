<?php

namespace App\Http\Controllers;
use App\Models\Cargo;
use Illuminate\Http\Request;

class cargoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

    }

    //list
    public function list(){
        $cargos=Cargo::get();
        return view('cargos.cargoslist',compact('cargos'));
    }

    //new
    public function new(){
        return view('cargos.addcargo');
    }

    //add

    public function add(Request $request){
        dd($request);
    }
}
