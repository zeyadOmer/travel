<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Models\trip;
use Facade\FlareClient\Http\Response;
use Facade\FlareClient\View;

class tripController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }
    //
    public function index(){

        $trips =trip::get();
        return view('trips.tripslist' , compact('trips'));
    }
    public function add( Request $request){
        $request->validate([
            'company_id' => 'required|exists:companys,id',
            'location_id' => 'required|exists:locations,id',
            'destination_id' => 'required|exists:locations,id',
            'bus_id' => 'required|exists:buss,id',
            'start_date' => 'required|date',
            'depart' => 'required|date_format:H:i',
            'estimated_date' => 'required|date',
            'arrive' => 'required|date_format:H:i',
        ]);

        // Add logic to create a new trip in the database using the validated data
        $trip = new Trip([
            'company_id'        => $request->input('company_id'),
            'location_id'       => $request->input('location_id'),
            'destination_id'    => $request->input('destination_id'),
            'bus_id'            => $request->input('bus_id'),
            'service_id'        => $request->input('service_id'),
            'start_date'        => $request->input('start_date'),
            'depart'            => $request->input('depart'),
            'estimated_date'    => $request->input('estimated_date'),
            'arrive'            => $request->input('arrive'),
            'status'            =>'new',
        ]);

        // Save the trip to the database
        $trip->save();

        // Redirect or perform any other actions after successful submission
        return redirect()->route('trips.list'); // Adjust the route name as needed
    }


    public function editview($id){

        $trip =Trip::find($id);

        return view('trips.edittrip',compact('trip'));

    }

    public function edit(Request $request,$id){
        
            $trip=Trip::findOrFail($id);
            if ($trip->update($request->all())) {
                return redirect()->back();
                } 
                    return back();
    }

    public function search(Request $request){
        $trips = Trip::with('company')
        ->where([
            'location_id' => $request->location['location'],
            'destination_id' => $request->location['destination'],
        ])->get();
        return View('pages.tripsSearch', compact('trips'));
    }
    public function searchtrip(Request $request){
        // dd($request->all()); // Uncomment this line to inspect the contents of the request

        $trips = Trip::with('company','bus','location','destination')
        ->where([
            'location_id' => $request->input('location'), // Assuming 'location' is an array
            'destination_id' => $request->input('destination'), // Assuming 'location' is an array
        ])->get();
        // foreach($trips as $trip){
        //     $trip->companyName=Company::where('id',$trip->company_id)->get('name');
        //     $trip->companyLogo=Company::where('id',$trip->company_id)->get('logo');
        //     $trip->capacity=Bus::where('id',$trip->bus_id)->get();
        // }
    
        return response()->json($trips);
    }
    
    public function delete($id){
        $trip=Trip::findOrFail($id);
        if ($trip->status == "started"){
            session()->flash("error", "You can not cancel this ticket because it has been confirmed");
            return redirect()->back();
            }elseif($trip->status=="finished") {
                session()->flash("error","This ticket has already been cancelled.");
                return redirect()->back();
                } else{
                    $trip->delete();
                    session()->flash("success","The ticket was successfully deleted.");
                    return redirect()->back();}
                    
    }
    
}
