<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isNull;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $posts = Post::all();

        $posts = Post::where('status',0)->get();
        return view('admin.posts',['posts' => $posts]);
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
    public function store(PostRequest $request)
    {
        $user = Auth::user();
        $validatedData = $request->validated();
        $consultant_id = $user->consultant->id;
        if(Auth::user() && $user->verified == 'verified'){
            $post = Post::create([
                'title' => $validatedData['title'],
                'text' => $validatedData['text'],
                'const_id' => $consultant_id
            ]);
            return redirect()->back()->with('success', 'Post created successfully');
        }else{
            return redirect()->back()->with('error', 'Please verify your account first');
        }
        
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
