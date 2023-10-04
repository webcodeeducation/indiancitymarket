<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Session;
use Hash;
//use Auth;
use Mail;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';


    protected $username;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->username = $this->findUsername();
    }

    public function login(Request $request)
    {
        echo 'login testing';
        print_r($_POST);
        echo $request->get('email');
        echo $password = $request->get('password');
        $user = User::where(['username'=>$request->get('email')])->first();
        print_r($user);
        echo $encrypted_password = $user->password;
        if(Hash::check($password, $encrypted_password)){
                            //$roles = Roles::where('id', $user->user_role)->first();
                            echo 'success';
                            //return redirect()->route($redirect);     
                            //return redirect()->back();
                        }
                        else{
                            return redirect()->back();
                        }
                        die();
        /*if(is_numeric($request->get('email'))){
            return ['phone'=>$request->get('email'),'password'=>$request->get('password')];
            echo 'Yes';
        }else{
            echo 'No';
        }*/
        $opt = '';
        if(is_numeric($request->get('email'))){
            $opt = 'Phone';
            $validator = Validator::make($request->all(), [
            'email' => 'required|regex:/[0-9]{10}/|digits:10',
            'password' => 'required',
            
        ]);

        } elseif(filter_var($request->get('email'), FILTER_VALIDATE_EMAIL)) {
            $opt = 'Email';
            $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
            
        ]);
        }else{
            $opt = 'Username';
            $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
            
        ]);
        }

        // Check validation
        if ($validator->fails()) {
            return redirect('/register/step2')
                        ->withErrors($validator)
                        ->withInput();
        }else{


            if($opt == 'Username'){
                echo 'Login with username';
                $user = User::where(['username'=>$request->get('email')])->first();
                print_r($user);
                // Set Auth Details
        		//\Auth::login($user);
                //$user = User::where(array['username'=>$request->get('email'),'password'=>$request->get('PASSWORD')])->first();
                //print_r($user);
                //if (\Auth::attempt(['username' => $request->email,'password' => $request->password])
                /*if(Auth::attempt ( array ('username' => $request->get('email'),'password' => $request->get('PASSWORD'))))
                    {
                        echo 'Login ok with username';
                        session ( ['name' => $request->email] );
                    }*/
            }elseif($opt == 'Phone'){
                echo 'Login with phone';
                $user = User::where(['mobile'=>$request->get('email')])->first();
                print_r($user);
                // Set Auth Details
        		//\Auth::login($user);
                //$user = User::where(array['mobile'=>$request->email,'password'=>$request->PASSWORD])->first();
                //print_r($user);
                //if (\Auth::attempt(['mobile' => $request->email,'password' => $request->password])
                /*if(Auth::attempt ( array ('mobile' => $request->get ( 'email' ),'password' => $request->get ( 'PASSWORD' ) ) ))
                    {
                        echo 'Login ok with mobile';
                        session ( ['name' => $request->email] );
                    }*/
            }elseif($opt == 'Email'){
                echo 'Login with email';
                $user = User::where(['email'=>$request->get('email')])->first();
                print_r($user);
                // Set Auth Details
        		//\Auth::login($user);
                //$user = User::where(array['email'=>$request->email,'password'=>$request->PASSWORD])->first();
                //print_r($user);
                //if (\Auth::attempt(['email' => $request->email,'password' => $request->password])
                /*if(Auth::attempt ( array ('email' => $request->get ( 'email' ),'password' => $request->get ( 'PASSWORD' ) ) ))
                    {
                    echo 'Login ok with email';
                    session ( ['name' => $request->email] );
                    }*/
            }
            die();
        /*$user = User::where(array['mobile_no'=>$request->mobile_no,'password'=>$request->password])->first();
        print_r($user);
      

        // Get user record
        $user = User::where(['mobile_no'=>$request->mobile_no,'password'=>$request->password])->first();
        print_r($user);
        die();

        // Check Condition Mobile No. Found or Not
        if($request->get('mobile_no') != $user->mobile_no) {
            \Session::put('errors', 'Your mobile number not match in our system..!!');
            return back();
        }        
        
        // Set Auth Details
        \Auth::login($user);
        
        // Redirect home page
        return redirect()->route('home');*/
    }
    }
    public function mobile()
    {
      return 'mobile';
    }
    public function findUsername()
    {
        $login = request()->input('login');
 
        $fieldType = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
 
        request()->merge([$fieldType => $login]);
 
        return $fieldType;
    }
 
    /**
     * Get username property.
     *
     * @return string
     */
    public function username()
    {
        return $this->username;
    }
}
