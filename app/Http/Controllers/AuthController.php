<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AuthModel;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\Validator; // Add this line to import the Validator facade
use Illuminate\Support\Facades\Session;


class AuthController extends Controller
{
    //
    public function index()
    {
        return view("auth-form.login");
    }

    public function register(Request $request)
    {

     

        // echo "<PRE>"; print_r($request->all());exit();
        // Validate the incoming request
        // $validator = Validator::make($request->all(), [
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|string|email|max:255|unique:users',
        //     'password' => 'required|string|min:8|confirmed', // Make sure password is confirmed
        // ]);

        // if ($validator->fails()) {
        //     return response()->json(['errors' => $validator->errors()], 400);
        // }

        // Create the user
        $user = AuthModel::create([
            '_token' => $request->_token,

            'firstname' => $request->firstname,

            'lastname' => $request->lastname,

            'email' => $request->Email,

            'phone' => $request->Phone,

            'city' => $request->city,

            'state' => $request->state,

            'country' => $request->country,

            'age' => $request->age,

            'password' => Hash::make($request->Password),
            'confirmpassword' => Hash::make($request->Confirmpassword),

        ]);

        // Automatically log in the user
        // AuthModel::login($user);

        // Return the authenticated user data (you can adjust this response as needed)
        return response()->json(['user' => $user, 'message' => 'Registration successful.'], 201);
    }

    /**
     * Handle user login.
     */
    public function login(Request $request)
    {
        // echo "<PRE>";print_r($request->all());exit();
        // Validate the incoming request
        // $validator = Validator::make($request->all(), [
        //     'email' => 'required|string|email|max:255',
        //     'password' => 'required|string|min:8',
        // ]);

        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }


        $user = AuthModel::where('email', $request->email)->first();

        //is_superadmin
        // echo "<PRE>"; print_R($user['is_superadmin']);exit();

        if(isset($user['is_superadmin']) && $user['is_superadmin'] == '1'){
            if ($user && Hash::check($request->password, $user->password)) {


                Session::put("admin",$user);
                
                return redirect()->route("admin.dashboard");

            }
        }


        return redirect('/login');

    }


    /**
     * Handle user logout.
     */
    public function adminlogout()
    {
        // Log out the user
        // AuthModel::logout();
        Session::forget('admin');

        return redirect('/'); 
    }




    public function getcurruntsession()
    {
        $session = Session('admin');
        // dd($session['id']);
        $data=[];
        $data['session']=$session;

        return $data; 
    }
}
