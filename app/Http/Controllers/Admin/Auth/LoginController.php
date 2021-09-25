<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AdminLoginVerifyRequest;

use Illuminate\Support\Facades\DB;
use App\Models\Admin;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    public function adminLogout()
    {
        session()->flush();
        return redirect()->route('admin.login');
    }
    public function adminPosted(AdminLoginVerifyRequest $request)
    {
        $admin = Admin::where('username',$request->Username)->first();

        if($admin==null)
        {

            $request->session()->flash('message', 'Invalid Username');

            return redirect(route('admin.login'));
        }

        else
        {
            if($request->Password==$admin->password)
            {
                session()->put('admin',$admin);
                //$request->session()->put('username', $request->Username);
                return redirect()->route('admin.dashboard');
            }

            else if($request->Password!=$admin->password)
            {
                $request->session()->flash('message', 'Invalid Password');
                return view('admin_panel.adminLogin');
            }
        }



    }
}
