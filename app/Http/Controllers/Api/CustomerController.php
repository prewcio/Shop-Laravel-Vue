<?php

namespace App\Http\Controllers\Api;

use App\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CustomerController extends Controller
{
    public function getUserInfo(Request $request){
        $token = $request->input('sessionID');
        $customer =  Customer::where('sessionID', $token)->first();
        return response()->json([
            'firstName'=>$customer->firstName,
            'lastName'=>$customer->lastName,
            'email'=>$customer->email
        ]);
    }

    public function checkLogin(Request $request) {
        $token = $request->input('token');
        $customer = Customer::where('email', $request->input('email'))->first();
        $password = $request->input('password');
        if($customer){
            if(password_verify($password,$customer->password)){
                $customer->sessionID = $token;
                $customer->save();
                return response()->json([
                    'success'=>1
                ]);
            } else {
                return response()->json([
                    'error'=>2
                ]);
            }
        } else {
            return response()->json([
                'error'=>1
            ]);
        }
    }

    public function checkLogged(Request $request){
        $token = $request->input('token');
        $customer = Customer::where('sessionID',$token)->first();
        if($customer){
            return response()->json([
                'success'=>1
            ]);
        }
    }

    public function registerCheck(Request $request) {
        $firstName = $request->input('password');
        $lastName = $request->input('passwordVerify');
        $email = $request->input('email');
        $password = $request->input('password');
        $passwordVerify = $request->input('passwordVerify');
        $token = $request->input('token');
        $customer = Customer::where('sessionID',$token)->first();
        if($customer){
            return response()->json([
                'success'=> 1
            ]);
        } else {
            $customer = Customer::where('email', $email)->first();

            if (!$customer) {
                if ($password == $passwordVerify) {
                    $customer = new Customer();
                    $customer->firstName = $firstName;
                    $customer->lastName = $lastName;
                    $customer->email = $email;
                    $customer->password = password_hash($password, PASSWORD_BCRYPT);
                    $customer->sessionID = $token;
                    $customer->save();
                    return response()->json([
                        'success' => 1
                    ]);
                } else {
                    return response()->json([
                        'error' => 2
                    ]);
                }
            } else {
                return response()->json([
                    'error' => 1
                ]);
            }
        }
    }

    public function logout(){
        $customer = Customer::where('sessionID', csrf_token())->first();
        if($customer){
            $customer->sessionID = "";
            $customer->save();
        }
        return Redirect::to("/");
    }
}
