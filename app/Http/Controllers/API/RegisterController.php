<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\RegisterAuthRequest;
use App\Models\User;
use Validator;

class RegisterController extends Controller
{
    private $apiToken;
    public function __construct()
    {
        // Unique Token
        $this->apiToken = uniqid(base64_encode(str_random(60)));
    }
    /**
     * Client Login
     */
    public function postLogin(Request $request)
    {
        // Validations
        $rules = [
            'phone'=>'required',
            'full_address' => 'required',
            'email' => 'required',
            'city' => 'required',
            'code' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            // Validation failed
            return response()->json([
                'message' => $validator->messages(),
            ]);
        } else {
            // Fetch User
            $user = User::where('phone',$request->phone)->first();
            if($user) {

                    $postArray = ['api_token' => $this->apiToken];
                    $login = User::where('phone',$request->phone)->update($postArray);

                    if($login) {
                        return response()->json([
                            "success"      => true,
                            'name'         => $user->full_name,
                            'phone'        => $user->phone,
                            'access_token' => $this->apiToken,
                        ]);
                    }
            } else {
                $postArray = [
                    'full_name'      => $request->name,
                    'phone'     => $request->phone,
                    'api_token' => $this->apiToken
                ];
                $user = User::insert($postArray);
                return response()->json([
                    "success" => true,
                    'status' => 200,
                    'name'         => $request->name,
                    'phone'        => $request->phone,
                    'access_token' => $this->apiToken,
                ]);
            }
        }
    }
    /**
     * Register
     */
    public function postRegister(Request $request)
    {
        // Validations
        $rules = [
            'name'     => 'required|min:3',
            'phone'    => 'required|unique:users',
//            'password' => 'required|min:8'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            // Validation failed
            return response()->json([
                'message' => $validator->messages(),
            ]);
        } else {
            $postArray = [
                'full_name'      => $request->name,
                'phone'     => $request->phone,
                'api_token' => $this->apiToken
            ];
            // $user = User::GetInsertId($postArray);
            $user = User::insert($postArray);

            if($user) {
                return response()->json([
                    "success" => true,
                    'name'         => $request->name,
                    'phone'        => $request->phone,
                    'access_token' => $this->apiToken,
                ]);
            } else {
                return response()->json([
                    "success" => false,
                    'status' => 400,
                    'message' => 'Registration failed, please try again.',
                ]);
            }
        }
    }
    /**
     * Logout
     */
    public function postLogout(Request $request)
    {
        $token = $request->header('Authorization');
        $user = User::where('api_token',$token)->first();
        if($user) {
            $postArray = ['api_token' => null];
            $logout = User::where('id',$user->id)->update($postArray);
            if($logout) {
                return response()->json([
                    "success" => true,
                    'status' => 200,
                    'message' => 'User Logged Out',
                ]);
            }
        } else {
            return response()->json([
                "success" => false,
                'status' => 400,
                'message' => 'User not found',
            ]);
        }
    }

//    public function register(RegisterAuthRequest $request)
//    {
//        $user = new User;
//        $user->name = $request->name;
//        $user->phone = $request->phone;
//        $user->api_token = $this->apiToken;
//        $user->save();
//
//        return response()->json([
//            'success' => true,
//            'data' => $user
//        ], 200);
//    }
}
