<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;


class CompanyController extends Controller
{
        
    
    
    //index
    public function index(){

        $companys = company::get();
        return view('companys.companyslist',['companys'=>$companys]);
    }
    
    
    
    //
        public function add(Request $request){

            
            
        // Handle file upload and rename the file
            if ($request->hasFile('logo')) {
                $uploadedFile = $request->file('logo');
                
                // Generate a unique name for the file
             // Generate a unique name for the file using timestamp
                $newFileName = time() . '.' . $uploadedFile->getClientOriginalExtension();

            
                // Store the file with the new name in the 'public/uploads/companys/logos' directory
                $logoPath = $uploadedFile->storeAs('uploads/companys/logos', $newFileName, 'public');
            } else {
                $logoPath = null; // or provide a default path if no logo is uploaded
            }
            
            Company::create([
            'name' => $request->name,
            'service_id' => $request->Services,
            'address'=> $request->address,
            'phone'=> $request->phone,
            'email'=> $request->email,
            'logo' =>$logoPath,
            ]);

        return back();
        }

        public function editView($id){
            $company=Company::find($id);
            return view('companys.editcompany', compact('company'));
        }

        public function edit(Request $request, $id){
            // Find the location in the database that we want to update
        $company=Company::find($id);
        // Validate the request.
        // $this->validate($request, [
        //     'location' => 'required|string|max:100',
        //     'station'  => 'required|string|max:250',
        //     ],[],
        //     ['location'=>'Location','station'=>'Station']);
            // Check if a new image has been uploaded
            if ($request->hasFile('logo')) {
                $uploadedFile = $request->file('logo');
                
                // Generate a unique name for the file
             // Generate a unique name for the file using timestamp
                $newFileName = time() . '.' . $uploadedFile->getClientOriginalExtension();

            
                // Store the file with the new name in the 'public/uploads/companys/logos' directory
                $logoPath = $uploadedFile->storeAs('uploads/companys/logos', $newFileName, 'public');
            } else {
                $logoPath = $company->logo; // or provide a default path if no logo is uploaded
            }
                    $company->update([
                        'name'=>$request['name'],
                        'service_id'=>$request['Services'],
                        'address' => $request['address'],
                        'phone' => $request['phone'],
                        'email' => $request['email'],
                        'logo'  =>$logoPath,
                    ]);

                        return redirect()->back();
                    
        }

        public function delete($id){
            $company=Company::findOrFail($id);
            Storage::delete('/storage/' . $company->logo);
            $company->delete();
        }
}
