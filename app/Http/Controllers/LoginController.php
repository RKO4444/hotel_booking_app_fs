<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function check(Request $request)
    {

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);


        if (Auth::attempt($credentials)) {
            return response()->json([
                'status' => true,
                'message' => "Success",
            ]);
        }
        return response()->json([
            'status' => false,
            'message' => "Fail"

        ]);
    }
    public function getdetail(Request $request)
    {
        $input = $request->all();
        $email = $input['email'];
       
       $users = DB::table('users')->select('id','role_id','name','email')->where('email' , $email )->get();
         return response()->json([
            'status' => true,
            'message' => "Registationdfghjkl Success",
            'mail' => $input['email'],
            'users' => $users
        ]);
    }
    // public function index(Request $request)
    // {
    //     if(is_numeric($request->get('email'))){
    //         $apm= ['mobile_no'=>$request->get('email'),'password'=>$request->get('password')];
    //         dd($apm);
    //     }
    //     $users = DB::table('users')->select('name','email','password','user_id')->get();
    //       dd($users);
    //     // $data = compact('users')
    //     // return view('your-view-name')->with('$data');
    // }
}
