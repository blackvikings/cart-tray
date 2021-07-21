<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends Controller
{
    public function index()
    {
        return response()->json(['success' => true,'status' => 200, 'category' => Category::all()]);
    }
}
