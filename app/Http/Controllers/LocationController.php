<?php

namespace App\Http\Controllers;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    //
    public function index(){
        $locations = Location::get();
        return view('locations.locationslist', compact('locations',$locations));
    }

   
    public function add(Request $request)
    {
        // Validate the form data
        $request->validate([
            'location' => 'required|string|max:255',
            'station' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the image validation rules as needed
        ]);

        // Handle file upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
        } else {
            // Handle the case when no image is uploaded
            $imageName = null; // Set a default value or handle it according to your requirements
        }

        // Create a new Location instance
        $location = new Location([
            'location' => $request->input('location'),
            'station' => $request->input('station'),
            'image' => $imageName,
        ]);

        // Save the Location instance to the database
        $location->save();

        // Redirect or perform any other actions after successful submission
        return redirect()->route('your.success.route'); // Adjust the route name as needed
    }

    public function editview($id){

        $location =Location::find($id);

        return view('locations.editlocation',compact('location'));

    }

    public function edit(Request $request,$id){
        // Find the location in the database that we want to update
        $location=Location::find($id);
        // Validate the request.
        $this->validate($request, [
            'location' => 'required|string|max:100',
            'station'  => 'required|string|max:250',
            ],[],
            ['location'=>'Location','station'=>'Station']);
            // Check if a new image has been uploaded
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images'), $imageName);
            } else {
                // Handle the case when no image is uploaded
                $imageName = null; // Set a default value or handle it according to your requirements
            }
                    $location->update([
                        'location'=>$request['location'],
                        'station'=>$request['station'],
                        'image' => $imageName,
                    ]);

                        return redirect('/adminpanel/Locations');
                        }
    


    public function delete($id){
        $location=Location::findOrFail($id);
        unlink(public_path()."/images/".$location->image);
        $location->delete();
    }
    
}
