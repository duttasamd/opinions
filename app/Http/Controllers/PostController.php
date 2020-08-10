<?php

namespace App\Http\Controllers;

use App\Post;
use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(Request $request)
    {
        $title = $request->title;
        //error_log('inside create post : '.$title);

        return view('post/create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => ['required', 'string', 'max:255', 'unique:posts'],
            'categorytags' => ['required']
        ]);

        if ($validator->fails()) {
            return redirect('post/create')
                ->withErrors($validator)
                ->withInput();
        } else {
            $post = Post::create(
                [
                    'profile_id' => Auth::user()->profile->id,
                    'title' => $request->title,
                    'description' => $request->description
                ]
            );

            foreach (json_decode($request->categorytags) as $category) {

                DB::table('post_category')->insert(
                    ['post_id' => $post->id, 'category_id' => \App\Category::where('name', $category -> value)->pluck('id')->first()]
                );
            }
        }

        return redirect('/');
    }

    public function show($post_id) {
        $post = Post::where('id', $post_id)->first();
        return view('/post/post', ["post"=>$post]);
    }
}
