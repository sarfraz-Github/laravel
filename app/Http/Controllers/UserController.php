<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\user;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{

    public function loginFormPage()
    {
        return view('login');
    }

    public function loginFormProcess(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'username'          =>  'required|email:rfc,filter|max:50',
                'password'          =>  'required|min:8|max:20'
            ]);

            if ($validator->fails()) {
                // echo 'validators fail';
                return response()->json(['errors' => true, 'msg' => 'Username or Password mismatch']);
            }

            $credentials = [
                'email' => $request->input('username'),
                'password' => $request->input('password'),
            ];

            if (Auth::attempt($credentials)) {
                $userRole = Auth::user()->role;
                if ($userRole == 0) {
                    // return view('admin/dashboard');
                    // return response()->json(['errors' => false, 'redirect' => route('admin/dashboard')]);
                    $redirectUrl = route('admin.dashboard');
                    return response()->json(['errors' => false, 'redirect' => $redirectUrl]);
                }
            } else {
                return response()->json(['errors' => true, 'msg' => 'Username or Password mismatch really']);
            }
        } catch (QueryException $e) {
            echo 'Error Catch : ' . $e->getMessage();
        }
    }

    public function createAccountForm()
    {
        return view('create_account');
    }

    public function saveUser(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'firstName'         =>  'required|max:20|string',
                'lastName'          =>  'required|max:20|string',
                'emailAddress'      =>  'required|email:rfc,filter|max:50',
                'role'              =>  'required|string',
                'password'          =>  'required|confirmed|min:8|max:20',
                'password_confirmation'          =>  'required|min:8|max:20'
            ]);

            if ($validator->fails()) {
                $fieldsNameWithErrors = $validator->errors()->keys();
                $validatedFieldNames  = array_diff(array_keys($request->all()), $fieldsNameWithErrors);
                return response()->json(['errors' => $validator->errors(), 'successField' => $validatedFieldNames], 422);
            }

            $isEmailExist = User::where('email', $request->emailAddress)->first();
            if ($isEmailExist) {
                return response()->json(['errors' => 'Email id already exist', 'errorField' => 'emailAddress'], 423);
            }


            //THERE ARE NO ERRORS-SAVE DATA TO DB
            $user          = new user();
            $user->first_name = $request->firstName;
            $user->last_name = $request->lastName;
            $user->last_name = $request->lastName;
            $user->email = $request->emailAddress;
            $user->role = $request->role;
            $user->password = $request->password;
            $user->save();

            return response()->json(['message' => 'Your account has been successfully created.']);
        } catch (QueryException $e) {
            Log::error('Custom error message: userController.php : ' . $e->getMessage());
            // Handle the database connection or query exception here
            return response()->json(['errors' => 'Database error: ' . $e->getMessage(), 'errorField' => 'errorDiv'], 423);
        }
    }
}
