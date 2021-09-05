<?php

namespace App\Http\Controllers\API;

use http\Env\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Prescription;
use App\Models\User;
use Validator;
use Storage;

class PrescriptionController extends Controller
{
    public function upload(Request $request)
    {
        // return response()->json([$request->all()]);
        $validator = Validator::make($request->all(), [
            'token' => 'required',
            'name' => 'required',
            'age' => 'required',
            'weight' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'mobile' => 'required',
            'image' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['message'=>$validator->errors()], 401);
        }
        $user = User::where('api_token', $request->token)->first();

        if(isset($user->id)){

                $image = $request->input('image');
                preg_match("/data:image\/(.*?);/",$image,$image_extension);
                $image = preg_replace('/data:image\/(.*?);base64,/','',$image);
                $image = str_replace(' ', '+', $image);
                $imageName = 'image_' . time() . '.' . $image_extension[1];

                Storage::disk('public_uploads')->put($imageName,base64_decode($image));

                $prescription = new Prescription;
                $prescription->title = 'uploads/prescription/'.$imageName;
                $prescription->user_id = $user->id;
                $prescription->name = $request->name;
                $prescription->age = $request->age;
                $prescription->weight = $request->weight;
                $prescription->email = $request->email;
                $prescription->gender = $request->gender;
                $prescription->mobile = $request->mobile;
                $prescription->save();

                return response()->json([
                    'status' => 200,
                    "success" => true,
                    "message" => "File successfully uploaded",
                    "name" => $request->name,
                    "age" => $request->age,
                    "weight" => $request->weight,
                    "email" => $request->email,
                    "gender" => $request->gender,
                    "mobile" => $request->mobile,
                    "image" => $request->image
                ]);
        }
        else{
            return response()->json([
                'status' => 200,
                "success" => false,
                "name" => $request->name,
                "age" => $request->age,
                "weight" => $request->weight,
                "email" => $request->email,
                "gender" => $request->gender,
                "mobile" => $request->mobile,
                "message" => "File not uploaded",
            ]);
        }

    }

    public function getPrescription($token)
    {
        $user = User::where('api_token',  $token)->first();
        if(isset($user->id))
        {
            $allPrescription = Prescription::where('user_id', $user->id)->get();

            return response()->json([
                    'status' => 200,
                    "success" => true,
                    'priscriptions' => $allPrescription
                ]);
        }
        else
        {
            return response()->json([
                    'status' => 200,
                    "success" => true,
                    "message" => "No Priscription found.",
                ]);
        }
    }
}
