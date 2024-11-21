<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AuthModel;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\Validator; // Add this line to import the Validator facade

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

        // Check if user exists with the provided email
        $user = AuthModel::where('email', $request->email)->first();

        // If the user is found and the password matches
        if ($user && Hash::check($request->password, $user->password)) {
            // Optionally log in the user manually if needed
            // Auth::login($user);

            
            return redirect()->route("admin.dashboard");
            // Return the authenticated user data
            // return response()->json(['user' => $user, 'message' => 'Login successful.'], 200);
        }

        // If the login fails, return an error
        // return response()->json(['error' => 'Unauthorized'], 401);
        return redirect('/login');

    }


    /**
     * Handle user logout.
     */
    public function logout()
    {
        // Log out the user
        AuthModel::logout();

        return response()->json(['message' => 'Logout successful.'], 200);
    }
}
