<?php

namespace App\Repositories\Eloquent;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;
use App\Models\Admin;
use App\Models\Client;
use App\Models\Consultant;
use App\Models\User;
use App\Repositories\UserRepositoryInterface;
use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Auth;
use TimWassenburg\RepositoryGenerator\Repository\BaseRepository;

/**
 * Class UserRepository.
 */
class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    /**
     * UserRepository constructor.
     *
     * @param User $model
     */
    public function __construct(User $model)
    {
        parent::__construct($model);


    }

    public function Login(LoginRequest $request){
        $request->validated();
        $credetials = $request->only('email','password');
        if(auth()->attempt(['email' => $request->email, 'password' => $request->password])){
            
            $user = Auth::user();
            $token = $user->createToken('auth_token')->plainTextToken;
            

            if($user->role == 'client'){
                return abort(view('about')->with('token', $token));
            }elseif($user->role == 'consultant'){
                return abort(redirect()->route('about')->with('token', $token));
            }elseif($user->role == 'super'){
                return abort(view('about')->with('token', $token));
                
            }elseif($user->role == 'admin'){
                return abort(redirect()->route('Speciality.index')->with('token', $token));
            }   

        }else{
            return back()->with('error','Invalid Email or password');
        }

    }

    public function store(UserRequest $request)
    {
        $user = User::create($request->validated());
        if ($request->role == 'consultant' && password_verify($request->confirm, $request->password)) {
            //creating consultant 
            $consultant = Consultant::create([
                'user_id' => $user->id,

            ]);
            $token = $user->createToken('auth_token')->plainTextToken;
            $user = Auth::user();
            

            return abort(redirect()->route('about')->with('token', $token));
            
        } elseif ($request->role == 'client' && password_verify($request->confirm, $request->password)) {
            //creating client
            $client = Client::create([
                'user_id' => $user->id,

            ]);
            $token = $user->createToken('auth_token')->plainTextToken;
            $user = Auth::user();
            return view('about')->with('token', $token);
            
            
        } elseif ($request->role == 'admin' && password_verify($request->confirm, $request->password)) {
            //creating admin
            $admin = Admin::create([
                'user_id' => $user->id,
            ]);
            $token = $user->createToken('auth_token')->plainTextToken;
            $user = Auth::user();
            return abort(redirect()->route('Speciality.index')->with('token', $token));
            
        } else {
            return back();
        }
        
    }

    

}
