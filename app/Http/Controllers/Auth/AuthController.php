<?php

namespace App\Http\Controllers\Auth;
namespace App\Http\Controllers\Auth;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;
use App\Models\Admin;
use App\Models\Client;
use App\Models\Consultant;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function  __construct(public UserRepositoryInterface $repository ){
        
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $this->repository->store($request);
        
    }

    /**
     * Display the specified resource.
     */
    public function LoginForm()
    {
        return view('auth.login');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function Login(LoginRequest $request)
    {
        $this->repository->Login($request);
    }

   

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Auth::logout();
        $request->session()->flush();
 
        $request->session()->invalidate();
 
        $request->session()->regenerateToken();
  
        return view('welcome');
    }
}
