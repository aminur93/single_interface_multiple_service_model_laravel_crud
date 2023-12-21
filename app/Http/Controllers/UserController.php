<?php

namespace App\Http\Controllers;

use App\Events\UserRegistered;
use App\Http\Requests\UserRequest;
use App\Jobs\SendUserRegistrationNotification;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function index()
    {
        //start here all user
        $users = User::latest()->get();

        return response()->json([
            'users' => $users
        ],Response::HTTP_OK);
    }

    public function store(UserRequest $request)
    {

        //start here user create
        if($request->method() == 'POST')
        {
            DB::beginTransaction();

            try{

                //create new user
                $user = new User();

                $user->name = $request->name;
                $user->email = $request->email;
                $user->phone = $request->phone;
                $user->address = $request->address;
                $user->country = $request->country;
                $user->city = $request->city;
                $user->password = bcrypt($request->password);

                $user->save();

                broadcast(new UserRegistered($user));

                dispatch(new SendUserRegistrationNotification($user));

                DB::commit();

                return response()->json([
                    'message' => 'Insert success'
                ],Response::HTTP_CREATED);

            }catch(Exception $e){
                DB::rollBack();

                $error = $e->getMessage();

                return response()->json([
                    'error' => $error
                ],Response::HTTP_INTERNAL_SERVER_ERROR);
            }
        }
    }

    public function edit($id)
    {
        //start here for single user
        $user = User::findOrFail($id);

        return response()->json([
            'user' => $user
        ],Response::HTTP_OK);
    }

    public function update(UserRequest $request, $id)
    {
        //start here for user update
        if($request->method() == 'PUT')
        {
            try{

                //update user
                $user = User::findOrFail($id);

                $user->name = $request->name;
                $user->email = $request->email;
                $user->phone = $request->phone;
                $user->address = $request->address;
                $user->country = $request->country;
                $user->city = $request->city;
                $user->password = bcrypt($request->password);

                $user->save();

                DB::commit();

                return response()->json([
                    'message' => 'Update success'
                ],Response::HTTP_OK);

            }catch(Exception $e){
                DB::rollBack();

                $error = $e->getMessage();

                return response()->json([
                    'error' => $error
                ],Response::HTTP_INTERNAL_SERVER_ERROR);
            }
        }
    }

    public function destroy($id)
    {
        //start here for destroy user
        try {
            $user = User::findOrFail($id);
            $user->delete();
    
            return response()->json(['message' => 'User deleted successfully'], 204);
        } catch (\Exception $e) {
            // Log the exception for debugging
            Log::error($e);
    
            return response()->json(['error' => 'Unable to delete user.'], 500);
        }
    }
}
