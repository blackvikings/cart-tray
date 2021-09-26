<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Category;
use App\Models\sale;
use App\Models\User;
use App\Models\Address;
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
        toastSuccess('Order status updated successfully');
    	return redirect()->route('admin.orderManagement');

    }
}
