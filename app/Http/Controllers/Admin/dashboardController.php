<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sale;

class dashboardController extends Controller
{
    public function index(){
        $sales =  Sale::all();
        return view('admin_panel.dashboard.index')
//        return view('layouts.app')
        ->with('sales',$sales);
    }
}
