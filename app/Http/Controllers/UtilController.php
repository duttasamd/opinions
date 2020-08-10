<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class UtilController extends Controller
{
    public function getcategories(Request $request)
    {
        $data = Category::all()->pluck('name');
        return response()->json($data, 200);
    }
}
