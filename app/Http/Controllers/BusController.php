<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Company;
use Illuminate\Http\Request;

class BusController extends Controller
{
    //
      //index
      public function index(){

        $buss = Bus::get();
        foreach($buss as $bus){

        // $company= Company::where('id',$bus->company_id) ->get();
    }

        return view('buss.buseslist',['buss'=>$buss]);
    }

    public function getBuses($id){
        $buses=Bus::where('company_id',$id)->get();
        return response()->json($buses);
    }
    public function add(Request $request){
       Bus::create([
        'company_id'        =>$request->company,
        'address'           =>$request->address,
        'plate'             =>$request->plate,
        'color'             =>$request->color,
        'Manufacture'      =>$request->manufacturer,
        'capacity'          =>$request->capacity,
        'level'          =>$request->level,
        'driver_id'         =>$request->driver,
       ]);
    }

    public function editView($id){
        $bus = Bus::find($id);
        return view('buss.editbus',compact('bus'));
    }

    public function edit(Request $request ,$id){
        $bus=Bus::find($id);
        $bus->update([
            'company_id'        =>$request->company,
            'address'           =>$request->address,
            'plate'             =>$request->plate,
            'color'             =>$request->color,
            'Manufacture'      =>$request->manufacturer,
            'capacity'          =>$request->capacity,
            'level'          =>$request->level,
            'driver_id'         =>$request->driver,
        ]);
        return redirect()->back();
    }

    public function delete($id){
        $bus=Bus::findOrFail($id);
        $bus->delete();
        return redirect()->route('buss.list');
    }
    
}
