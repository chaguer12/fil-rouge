<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageRequest;
use App\Http\Requests\ProfileRequest;
use App\Models\Consultant;
use App\Models\Speciality;
use App\Models\User;
use App\Services\ImageService;
use Illuminate\Http\Request;

class ConsultantController extends Controller
{
    private $imageService;

    public function __construct(ImageService $imageService)
    {

        $this->imageService = $imageService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $consultants = User::where('role','consultant')->where('status','unverified')->get();
        $specialities = Speciality::all();
        
        return view('admin.consultants',['consultants' => $consultants,'specilities' => $specialities]);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProfileRequest $request, $id)
    {
        
        $request->validated();
        $user = User::find($id);
        $user->update([
            'Firstname' => $request->input('Firstname'),
            'Lastname' => $request->input('Lastname'),
            'email' => $request->email,
            

        ]); 
        
        $consultant = Consultant::where('user_id',$id)->update([
            'description' => $request->input('description'),
            'speciality_id' => $request->speciality,
        ]);
        
        return redirect()->back()->with('success', 'Consultant updated successfully');
        
    }

    public function image(ImageRequest $imageRequest,$id){
        $imageRequest->validated();
        $user = User::find($id);
        $this->imageService->store($imageRequest->file("image"), $user->Consultant);
        // $consultant = Consultant::where('user_id',$id)->update([
            // 'image' =>  $this->imageService->store($imageRequest->file('image'), $consultant),
        // ]);
   

        return redirect()->back()->with('success', 'Image updated successfully');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function verify($id){
        $user = User::find($id);
        $user->status = 'verified';
        $user->save();
        return redirect()->route('consultant.index')->with('success', 'Consultant verified successfully');

    }


    public function profile(){

        $user = auth()->user();
        $specialities = Speciality::all();
        return view('consultant.profile',['user'=> $user,'specialities' => $specialities]);
        
    }

    public function redirect(Request $request){
        

        
        $consultants = Consultant::where('speciality_id',$request->speciality_id)->get();
        return view('client.consultants',['consultants' => $consultants]);



    }
}

