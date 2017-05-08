<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;

use app\Http\Requests;
use app\Company;
use app\Http\Controllers\Controller;
use JWTAuth;
use Hash;

class AuthController extends Controller
{
    public function authenticate(Request $request)
    {
      $credentials = $request->only('email', 'password');
      $company = Company::where('email',$credentials['email'])->first();
      
      if (!$company)
      {
        return response()->json([
          'error' => 'Invalid credentials (company)'          
        ],401);        
      }
      
//       if (!Hash::check($credentials['password'],$company->password)) 
//       {
//         return response()->json([
//           'error' => 'Invalid credentials (pass) ['.$company->password.'], ['.$credentials['password'].']'          
//         ],401);
//       }
      
      $token = JWTAuth::fromUser($company);
      
      $objectToken = JWTAuth::setToken($token);
      $expiration = JWTAuth::decode($objectToken->getToken())->get('exp');
      
      return response()->json([
        'access_token' => $token,
        'token_type' => 'bearer',
        'expires_in' =>  JWTAuth::decode($objectToken->getToken())->get('exp'),
      ]);
    }
}
