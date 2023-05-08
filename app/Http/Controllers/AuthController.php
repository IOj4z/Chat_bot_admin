<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class AuthController extends Controller
{
    public function createUser(Request $request)
    {
        try {
            //Validated
            $validateUser = Validator::make($request->all(),
                [
                    'name' => 'required',
                    'email' => 'required|email|unique:users,email',
                    'password' => 'required'
                ]);

            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            $user = Admin::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            return response()->json([
                'status' => true,
                'message' => 'User Created Successfully',
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
    public function login(){
        return view('auth.login');
    }
    public function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);


        $validated = auth()->attempt([
            'email' =>  $request->input('email'),
            'password' => $request->input('password'),
            'is_admin' =>1
        ]);
        if ($validated){
            return redirect()->route('dashboard')->with('success','Успешный вход');
        }else{

            return back()->with('error','Недействительные учетные данные');
        }
    }

    public function logout(){
        auth()->logout();
        return redirect()->route('login')->with('success','Вы вышли из сисстемы');
    }
}
