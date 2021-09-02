<?php

namespace App\Http\Controllers\API;

use App\Models\Cart;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Support\Facades\DB;
use Validator;
use App\Models\Address;
use App\Models\SaleDetail;
use App\Models\ProductSale;
use App\Models\Admin;
//use App\Notifications\NewOrder;

class ProductContoller extends Controller
{
    public function list($category = null)
    {
        if($category == null)
            return response()->json(['status' =>  200, "success" => true, 'products' => Product::all()]);
        else
            return response()->json(['status' => 200, "success" => true, 'products' => Product::where('category_id', $category)->get()]);
    }

    public function product($id)
    {
        return response()->json(['status' => 200, "success" => true, 'product' => Product::where('id', $id)->first()]);
    }

    public function search(Request $r)
    {
        $category = '';
        $name = '';
//        return $r->all();
        if($r->search){
            $category = $r->search;
        }
        if($r->search)
        {
            $name = $r->search;
        }
        $res = Product::all();
        // $cat = Category::all();

        if(isset($category) && isset($name) && $name != "" && $category != ""){
            $name = strtolower($name);
            $cat = DB::select( DB::raw("SELECT * FROM `categories` WHERE LOWER(name) like '%{$name}%'" ) );
            $sRes = DB::select( DB::raw("SELECT * FROM `products` WHERE LOWER(name) like '%{$name}%'" ) );

        }
        else if(isset($name) && $name != '' && $name != null){
            $name = strtolower($name);
            $sRes = DB::select( DB::raw("SELECT * FROM `products` WHERE LOWER(name) like '%{$name}%'" ) );
        }
        else if(isset($category) && $name != '' && $name != null){
            $sRes = DB::table('products')
                ->where("category_id" , $category)
                ->get();
        }

        if(!isset($category)) {
            $category = -1;
        }


        if(!isset($sRes))
        {
            return response()->json([
                "success" => true,
                'status' => 200,
                'message' => 'No data found'
            ]);
        }
        else
        {
            return response()->json([
                "success" => true,
                'status' => 200,
                'products' => $sRes,
                'cat' => $cat,
                'a' => $category
            ]);
        }



    }

    public function addTocart(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required',
            'token' => 'required',
            'qty' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message'=>$validator->errors()], 401);
        }
        $user = User::where('api_token', $request->token)->first();
        if($user == null)
        {
            return response()->json([
                'status' => 400,
                "success" => false,
                "message" => "User token mismatch",
            ]);
        }

        $cartCount = Cart::where('user_id', $user->id)->where('product_id', $request->product_id)->count();
        // dd($cartCount);
        if($cartCount == 0)
        {
            $cart = new Cart;
            $cart->product_id = $request->product_id;
            $cart->qty = $request->qty;
            $cart->user_id =$user->id;
            $cart->save();

            return response()->json([
                "status" => 200,
                "success" => true,
                "message" => "product successfully added in cart",
            ]);
        }
        else
        {
            $cart = Cart::where('user_id', $user->id)->with('products')->get();

            return response()->json([
                "status" => 200,
                "success" => true,
                "message" => "product already in a cart",
                "cart" => $cart
            ]);
        }


    }

    public function removeCart($id)
    {
        Cart::where('id', $id)->delete();

        return response()->json([
            'status' => 200,
            "success" => true,
            "message" => "product successfully deleted from cart",
        ]);

    }

    public function cartList($token)
    {
        $user = User::where('api_token', $token)->first();
        if($user == null)
        {
            return response()->json([
                'status' => 200,
                "success" => false,
                "message" => "User token mismatch",
            ]);
        }

        $cart = Cart::where('user_id', $user->id)->with('products')->get();
        if ($cart == null || $cart->isEmpty())
        {
            return response()->json([
                'status' => 200,
                "success" => true,
                "message" => "No products exists in cart.",
            ]);
        }

        $subTotal = 0;
        foreach($cart as $cat)
        {
            if($cat->products != null)
            {
                $subTotal = $subTotal + $cat->products->price;
            }
        }

        return response()->json([
                'status' => 200,
                "success" => true,
                "cart" => $cart,
                "subtotal" => $subTotal
            ]);
    }

    public function order(Request $request, $token)
    {
        // return $request->all();
        $validator = Validator::make($request->all(), [
            'product_id' => 'required',
            'qty' => 'required',
            'address' => 'required',
            'city' => 'required',
            'zip' => 'required',
            'orderMethod' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['message'=>$validator->errors()], 401);
        }


        $user_id = User::where('api_token', $token)->first();

        // dd($user_id->toArray());
        $sales= new sale();
        $sales->user_id=$user_id->id;
        $sales->order_status='Placed';
        $sales->orderMethod = $request->orderMethod;
        $sales->save();


        foreach ($request->product_id as $product_id)
        {
            DB::table('product_sale')->insert(['product_id' => $product_id, 'sale_id' => $sales->id]);

            Cart::where('product_id', $product_id)->where('user_id', $user_id->id)->delete();
        }

        foreach($request->qty as $qty)
        {
            SaleDetail::create(['sale_id' => $sales->id, 'qty' => $qty]);
        }

        if($user_id->address_id == null){
            $add=new Address();
            $add->area=$request->address;
            $add->city=$request->city;
            $add->zip=$request->zip;
            $add->save();
            $user_id->address_id=$add->id;
            $user_id->save();
        }


//            foreach(Admin::all() as $admin){
//                $admin->notify(new NewOrder);
//            }

        return response()->json([
                'status' => 200,
                "success" => true,
                "message" => "Order Placed successfully.",
        ]);
    }


    public function address($token)
    {
        $user = User::where('api_token', $token)->first();
        $address = Address::where('id', $user->address_id)->first();

        return response()->json([
            'status' => 200,
            "success" => true,
            "address" => $address
        ]);
    }


    public function updateAddress(Request $request, $id)
    {
        // dd($request->toArray());
        $validator = Validator::make($request->all(), [
            'address' => 'required',
            'city' => 'required',
            'zip' => 'required'
        ]);

         if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        $address = Address::where('id', $id)->first();
        $address->area=$request->address;
        $address->city=$request->city;
        $address->zip=$request->zip;
        $address->save();

        return response()->json([
            'status' => 200,
            "success" => true,
        ]);
    }

    public function history(Request $request, $token)
    {


        $user = User::where('api_token', $token)->first();

        $res1= sale::where('user_id', $user->id)->with('saledetails')->with(['user' => function($q){
                $q->with('addresses');
            }])->get();

        $product_ids = [];

        // dd($res1->toArray());
        foreach($res1 as $sale)
        {
            $pd_id = ProductSale::where('sale_id', $sale->id)->get();
            // dd($pd_id->toArray());
            if(!$pd_id->isEmpty())
            {
                foreach($pd_id as $id)
                {
                    $product_ids[] =  $id->product_id;
                }

            }

        }

        $products = Product::whereIn('id', $product_ids)->get();

        if(!$res1)
        {
            return response()->json([
                'status' => 400,
                "success" => true,
                "message" => "No order placed.",
            ]);
        }

        return response()->json([
            'status' => 200,
            "success" => true,
            "data" => $res1,
            'products' => $products
        ]);
    }

}
