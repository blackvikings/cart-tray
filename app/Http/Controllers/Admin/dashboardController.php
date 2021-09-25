<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\sale;

class dashboardController extends Controller
{
    public function index(){
        $sales =  sale::all();
        return view('admin_panel.dashboard.index')
        ->with('sales',$sales);
    }
}
