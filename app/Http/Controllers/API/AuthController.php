<?php

namespace App\Http\Controllers\API;

use Exception;
use GuzzleHttp\Client;
use App\Models\Users\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\Client as OClient;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public $successStatus = 200;

    public function login(Request $request) {

        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);

        $email     = $request->email;
        $password  = $request->password;

        return $this->getTokenAndRefreshToken($email, $password);
    }
    public function resetlink(Request $request) {

    }

    public function register(Request $request) {

        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }
        return $this->createuser($request);
    }

    public function createuser(Request $request)
    {
        $email     = $request->email;
        $password  = $request->password;

        $user = new User();
        $user->first_name        = $request->first_name;
        $user->last_name         = $request->last_name;
        $user->email             = $email;
        $user->password          = Hash::make($password);
        $user->active            = true;
        $user->confirmed         = true;
        $user->confirmation_code = md5(uniqid(mt_rand(), true));
        $user->save();

        if($user){
            return $this->getTokenAndRefreshToken($email, $password);
        }
    }

    public function getTokenAndRefreshToken($email, $password) {
        $oClient = OClient::where('password_client', 1)->first();
        $http = new Client;
        try{
            $response = $http->post(config('services.passport.login_endpoint'), [
                'headers' => [
                    'cache-control' => 'no-cache',
                    'Content-Type' => 'application/x-www-form-urlencoded'
                ],
                'form_params' => [
                    'grant_type'    => 'password',
                    'client_id'     => $oClient->id,
                    'client_secret' => $oClient->secret,
                    'username'      => $email,
                    'password'      => $password,
                    'scope'         => '*',
                ],
            ]);
            $result = json_decode((string) $response->getBody(), true);
            return response()->json($result, $this->successStatus);
        } catch (\GuzzleHttp\Exception\BadResponseException $e) {
            if ($e->getCode() === 400) {
                return response()->json('Invalid Request. Please enter a username or a password.', $e->getCode());
            } else if ($e->getCode() === 401) {
                return response()->json(
                    [
                        'message' => 'Your credentials are incorrect. Please try again'
                    ],
                    $e->getCode()
                );
            }
            return response()->json('Something went wrong on the server.', $e->getCode());
        }
    }

    public function refreshToken(Request $request) {
        $refresh_token = $request->header('Refreshtoken');
        $oClient = OClient::where('password_client', 1)->first();
        $http = new Client;

        try {
            $response = $http->post(config('services.passport.login_endpoint'), [
                'form_params' => [
                    'grant_type'    => 'refresh_token',
                    'refresh_token' => $refresh_token,
                    'client_id'     => $oClient->id,
                    'client_secret' => $oClient->secret,
                    'scope'         => '*',
                ],
            ]);
            return json_decode((string) $response->getBody(), true);
        } catch (Exception $e) {
            return response()->json("unauthorized", 401);
        }
    }

    public function user() {
        $user = Auth::user()->load('roles', 'permissions');

        $roles = [];
        $permissions = [];

        foreach (Role::all() as $role) {
            if ($user->hasAnyRole($role->name)) {
                $roles[] = $role->name;
            }
        }

        foreach (Permission::all() as $permission) {
            if ($user->can($permission->name)) {
                $permissions[] = $permission->name;
            }
        }
        return response()->json([
            'user' => $user,
            'roles' => $roles,
            'permissions' => $permissions,
        ], $this->successStatus);
    }

    public function logout(Request $request) {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

    public function unauthorized() {
        return response()->json("unauthorized", 401);
    }
}
