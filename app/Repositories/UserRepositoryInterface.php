<?php

namespace App\Repositories;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;

interface UserRepositoryInterface
{
   // Extend with your methods

   public function Login(LoginRequest $request);

   public function store(UserRequest $request);

   

}
