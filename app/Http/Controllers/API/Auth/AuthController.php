<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\VerificationCode;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:15', 'unique:users'],
            'mobile' => ['required', 'string', 'max:15', 'unique:users'],
            'email' => ['required', 'string', 'unique:users'],
            'club_id' => ['required'],
            'password' => ['required', 'string', 'min:4'],
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(),422);
        }
        $user = User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'mobile' => $data['mobile'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'club_id' => $data['club_id'],
            'status' => true,
        ]);

        if ($user) {
            $token = $user->createToken(uniqid())->plainTextToken;
            $user['token'] = $token;
        }

        return response()->json([
            'success' => true,
            'code' => 201,
            'message' => 'User Successfully Registered !',
            'token' => $token,
            'data' => $user
        ]);
    }

    public function login(Request $request)
    {

        $request->validate([
            'email'         => 'required',
            'password'      => 'required'
        ]);

        $loginType = filter_var($request->input('email'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        //
        try {
            // if (Auth::attempt($request->only('email', 'password'))) {
            if (Auth::attempt([$loginType => $request->email, 'password'=>$request->password])) {
                $user = Auth::user();
                $token = $user->createToken(uniqid())->plainTextToken;
                $user['token'] = $token;
                return response()->json([
                    'message' => 'successfully login',
                    'token' => $token,
                    'data' => $user
                ]);
            };
        } catch (Exception $exception) {
            return response()->json([
                'message' => $exception->getMessage()
            ], 400);
        }

        return response()->json([
            'success' => false,
            'code' => 403,
            'message' => 'Opps ! Username or Email or password wrong !'
        ], 403);
    }

    // Logout
    public function logout(Request $request)
    {
        $user = $request->user();
        // Revoke all tokens...
        // $user->tokens()->delete();
        // Revoke a specific token...
        $user->tokens()->where('id', $user->currentAccessToken()->id)->delete();

        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'User Successfully logged out',
        ]);
    }
}




//////
// public function login(Request $request)
//     {
//         $request->validate([
//             'email'         => 'required|email',
//             'password'      => 'required'
//         ]);

//         //
//         try{
//             if(Auth::attempt($request->only('email', 'password'))){
//                 $user = Auth::user();
//                 return response()->json([
//                     'message'=> 'successfully login',
//                     'token'=> 'token',
//                     'data'=> $user
//                 ]);
//             };
//         }catch(Exception $exception){
//             return response()->json([
//                 'message'=> $exception->getMessage()
//             ]);
//         }

//         return response()->json([
//             'message'=> 'invalid email'
//         ]);



//     }
