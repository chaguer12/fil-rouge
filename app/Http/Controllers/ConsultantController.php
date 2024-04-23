<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\Consultant;
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
        return view('admin.consultants',['consultants' => $consultants]);
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
        $user = User::find($id);
        $user->update([
            'Firstnale' => $request->input('firstname'),
            'Lastname' => $request->input('lastname'),
            'email' => $request->input('email'),

        ])->save(); 
        $consultant = Consultant::where('user_id',$id)->update([
            'description' => $request->input('description'),
        ])->save();
        // if ($request->hasFile('image')) {
        //     $this->imageService->store($request->file('image'), $user);
        // }
        return redirect()->back()->with('success', 'Consultant updated successfully');
        
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
        return view('consultant.profile',['user'=> $user]);
        
    }
}
