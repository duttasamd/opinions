<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function fetchautocomplete(Request $request)
    {
        $query = $request->term;
        if($query) {
            error_log('inside');
            $posts = Post::search($query)->limit(10)->pluck('id', 'title');

            $jsonposts = array();

            foreach($posts as $key => $value)
            {
                $jsonpost = array(
                    "label" => $key,
                    "value" => $value
                );
                array_push($jsonposts, $jsonpost);
            }

            array_push($jsonposts, array(
               "label" => "Create : ".$request->term,
                "value" => -1
            ));

            return response()->json($jsonposts, 200);
        }
    }
}
