<?php
namespace App\Http\Controllers\Api;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use App\User; 
use Illuminate\Support\Facades\Auth; 
use Validator;
class AuthController extends Controller 
{
 public $successStatus = 200;
  
 public function register(Request $request) {    
      //  dd($request->all());
      $validator = Validator::make($request->all(), 
              [ 
              'name' => 'required',
              'email' => 'required|email',
              'password' => 'required',  
              'c_password' => 'required|same:password', 
             ]);   
 if ($validator->fails()) {          
       return response()->json(['error'=>$validator->errors()], 401);                        }    
      $input = $request->all();  
      $input['password'] = bcrypt($input['password']);
      $user = User::create($input); 
 $success['token'] =  $user->createToken('AppName')->accessToken;
      $success['token'] = $remember_token;
      return response()->json(['success'=>$success,'user'=>$user], $this->successStatus); 
}
  
   
public function login(){ 
      if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){ 
            $user = Auth::user(); 
            $success['token'] =  $user->createToken('AppName')-> accessToken; 
           // $success['token'] = sha1(time());
            return response()->json(['success' => $success,'user'=>$user], $this-> successStatus); 
      }else{ 
            return response()->json(['error'=>'Unauthorised'], 401); 
      } 
}
  
      public function getUser() {
            $user = Auth::user();
            return response()->json(['success' => $user], $this->successStatus); 
      }
} 