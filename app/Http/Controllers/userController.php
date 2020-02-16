<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Demo;

class userController extends Controller
{
    public function create(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password|min:6',
            'gender' => 'required',
            'address' => 'required',
            'dob' => 'required',
            'city' => 'required',
            'hobbies' => 'required',

        ]);



        $email = $request->email;

        $flag = Demo::where('email', $email)->first();
        if ($flag) {
            $response["status"] = "Already exists";
            return $response;
        }
        $data = new Demo;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = $request->password;
        $data->genter = $request->gender;
        $data->address = $request->address;
        $data->dob = $request->dob;
        $data->city = $request->city;
        $hobbies = implode(',', $request->hobbies);
        // dd($request->hobbies);
        $data->hobbies = $hobbies;
        if ($data->save()) {
            $response["status"] = "success";
        } else {
            $response["status"] = "failure";
        }
        return $response;
    }
}
