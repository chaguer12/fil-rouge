<?php

namespace App\Http\Controllers;

use App\Models\Speciality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SpecialityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $specialities = Speciality::all();
        return view('admin.dashboard',[
            'specialities' => $specialities,
            
        ]);
    }

    public function display(){
        // dd(Auth::user()->role);
        $specialities = Speciality::all();
        return view('client.specialities',[
            'specialities' => $specialities,
            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'speciality' => 'required|string|max:30',
        ]);
        $speciality = new Speciality();
        $speciality->speciality_name = $validatedData['speciality'];
        $speciality->save();
      
        return redirect()->route('Speciality.index')->with('success', 'Speciality created successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Speciality $speciality)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Speciality $speciality)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $speciality)
    {
   
        
        // $request->validate([
            //     'Speciality' => 'required|string|max:255', 
            
            // ]);
            
            // $speciality->update([
                //     'Speciality' => $request->Speciality,
                
                // ]);
                
        dd($request->all());
        $validatedData = $request->validate([
            'speciality' => 'required|string|max:255',
            // Add validation rules for other fields as needed
        ]);
    
        // Update the Speciality instance with the validated data
        $speciality->update($validatedData);

        return redirect()->route('Speciality.index')->with('success', 'Speciality updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       if(Speciality::destroy($id)){

        return redirect()->route('Speciality.index')->with('success', 'Speciality deleted successfully!');
        
       }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    
}