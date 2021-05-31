<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //Function to create new user
    public function register(Request $request)
    {
        //Validating the input values
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed',
            'user_type' => 'required|integer',
        ]);

        //Creating new user using User model
        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'user_type' => $fields['user_type'],
            'password' => bcrypt($fields['password'])
        ]);

        //Generating token
        $token = $user->createToken('taskapptoken')->plainTextToken;

        //Return user details and token
        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function login(Request $request)
    {
        //Validate login inputs
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        // Check email
        $user = User::where('email', $fields['email'])->first();

        // Check password
        if (!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Incorrect Username or Password'
            ], 401);
        }

        //Cerate token user when login
        $token = $user->createToken('myapptoken')->plainTextToken;

        //Return user details and token
        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    //User logout function
    public function logout(Request $request)
    {
        //Delete token
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Logged out'
        ];
    }

    //Get all coordinator/advisor users of assign to leads.
    public function getUsers()
    {
        //Fetch except admin user type
        return User::where('user_type', '!=', 0)->get();
    }
}
