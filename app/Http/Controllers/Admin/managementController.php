<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Category;
use App\sale;
use App\User;
use App\Address;
class managementController extends Controller
{
    public function manage()
    {
        $sale= sale::with(['user' => function($query){
    	    $query->with('addresses');
        }])->with('product')->with('saledetails')->get();

        $status = ['Placed','On Process','Delivered','Cancel'];

        return view('admin_panel.orders.index', compact('sale', 'status'));
    }
    public function update(Request $r)
    {
    	$n=sale::find($r->orderId);

    	if($n)
    	{
    		$n->order_status=$r->stat;
    		$n->save();
    	}
    	return redirect()->route('admin.orderManagement');

    }
}
