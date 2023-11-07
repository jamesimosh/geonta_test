<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\WalletModel;
use App\Mail\AccountActivationEmail;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    protected $redirectTo = '/admin/home';

    private function generateUniqueCode($userID)
    {
        return dechex(rand(0, 1000).''.$userID.''.time());
    }
    
    public function showLoginForm()
    {
        if (Auth::guard('web')->check()) 
        {
            if(Auth::user()->user_group == 1)
            {
                return redirect()->intended(url('/admin/home'));
            }
            else
            {
                return redirect()->intended(url('/'.Auth::user()->id));
            }
        } 
        else 
        {
            return view('auth.login');
        }
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        //Check if email is active
        if (User::where('email', $request->email)->first()->email_verified_at == NULL) 
        {
            return redirect()->back()->with('error', 'Please verify your email.');
        }

        if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password], 1)) 
        {
            $request->session()->regenerate();
            if(Auth::user()->user_group == 1)
            {
                return redirect()->intended(url('/admin/home'));
            }
            if(Auth::user()->user_group == 2)
            {
                return redirect()->intended(url('/'.Auth::user()->id));
            }
            else
            {
                return redirect()->back()->with('error','Invalid.');
            }
        }
        else
        {
            return redirect()->back()->with('error','Credentials doesn\'t match.');
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function resetPass(Request $request)
    {
        if(!$request->email)
        {
            return json_encode(array("sms" => "Invalid Request"));
        }

        $val = rand(1000, 9999);
        $code = "KV".$val."S";

        if(DB::table('users')->where('email', $request->email)->exists())
        {
            //Send Email/ SMS
            $userVal = DB::table('users')->where('email', $request->email)->first();
            $number = UtilController::changephonenumber($userVal->phone);
            //Send SMS
            UtilController::sendSMS($number, $code." is your reset password code.");
            DB::table('users')->where('email', $request->email)->update(["resetpass_token" => $code]);
            $data = array("code" => $code);
            return json_encode(array("message" => "Reset password code has been sent to your phone","status_code" => 1, "data" => $data));
        }
        else
        {
            echo json_encode(array("message" => "Account Doesn't Exist", "status_code" => 1));
        }        
    }

    public function resePassPost(Request $request)
    {
        if(!$request->email)
        {
            return json_encode(array("sms" => "Invalid Request"));
        }

        if(!$request->code)
        {
            return json_encode(array("sms" => "Invalid Request"));
        }

        if(DB::table('users')->where('email', $request->email)->where('resetpass_token', $request->code)->exists())
        {
            echo json_encode(array("verified" => 1));
        }
        else
        {
            echo json_encode(array("sms" => "Invalid Code"));
        }  
    }

    public function UpdateresetPass(Request $request)
    {
        if(!$request->email)
        {
            return json_encode(array("sms" => "Invalid Request"));
        }

        if(!$request->code)
        {
            return json_encode(array("sms" => "Invalid Request"));
        }

        if(!$request->password)
        {
            return json_encode(array("sms" => "Invalid Request"));
        }

        DB::table('users')->where('email', $request->email)->where('resetpass_token', $request->code)->update(
            [
                "password" => sha1($request->password)//Hash::make($request->password)
            ]
        );

        DB::table('users')->where('email', $request->email)->where('resetpass_token', $request->code)->update(
            [
                "resetpass_token" => ""//Hash::make($request->password)
            ]
        );

        return json_encode(array("sms" => "Success", "status_code" => 1));
    }

    public function signForm()
    {
        if (Auth::guard('web')->check()) 
        {
            return redirect()->intended(url('/accounts/profile/'.Auth::user()->id));
        } 
        else 
        {
            return view('auth.signup');
        }
    }

    public function signUp(Request $request)
    {
        //Validation
        $validator = Validator::make($request->all(), [
            'register_fname' => 'required',
            'register_lname' => 'required',
            'register_phone' => 'required|unique:users,phone',
            'register_email' => 'required|email|unique:users,email',
            'register_pass2' => 'required',
            'register_pass1' => 'required',
        ]);
 
        if ($validator->fails()) 
        {
            return redirect()
                        ->back()
                        ->with("error", "Invalid inputs")
                        ->withInput();
        }
 
        // Retrieve the validated input...
        $validated = $validator->validated();

        $firstname = $request->register_fname;
        $lastname = $request->register_lname;
        $phone = $request->register_phone;
        $email = $request->register_email;
        $password_confirm = $request->register_pass2;
        $password = $request->register_pass1;
        $username = $request->username;

        if($password != $password_confirm)
        {
            return redirect()->back()->with('error', 'Password confirm doesn\'t much');
        }

        if(!$username)
        {
            $username = $firstname.' '.$lastname;
        }

        if(!User::where('email', $email)->exists())
        {
            try 
            {
                $user = new User();
                $user->password = Hash::make($password);
                $user->email = $email;
                $user->first_name = $firstname;
                $user->last_name = $lastname;
                $user->username = $username;
                $user->phone = $phone;
                $user->user_group = 2;
                // $user->email_verified_at = now();
                $user->remember_token = Str::random(10)."".time();
                $user->is_deleted = 0;
                $user->save();

                //Creating wallet
                $wallet = new WalletModel();
                $wallet->user_id = $user->id;
                $wallet->wallet_code = strtoupper($this->generateWalletCode($user->id));
                $wallet->balance = 0.00;
                $wallet->save();

                //Send email verification code
                $url = route('email.activate', ["token" => $user->remember_token, "email" => $email]);//"".$this->generateWalletCode(2);
                // The email sending is done using the to method on the Mail facade
                Mail::to($email)->send(new AccountActivationEmail($url));

                return redirect(route('login'))->with('success', "Verification email sent to your email. Please verify your email.");
            } 
            catch (\Throwable $th) 
            {
                // throw $th;
            }           
        }
        else
        {
            return redirect()
                        ->back()
                        ->with("error", "Email has been taken")
                        ->withInput();
        }
    }

    public function activateAccount(Request $request)
    {
        if(!$request->token)
        {
            return redirect(route('login'))->with("error","Invalid request");
        }

        if(!$request->email)
        {
            return redirect(route('login'))->with("error","Invalid request");
        }

        if(User::where('remember_token', $request->token)->where('email', $request->email)->exists())
        {
            User::where('remember_token', $request->token)->where('email', $request->email)->update(
                [
                    "email_verified_at" => now()
                ]
            );

            return redirect(route('login'))->with("success" , "Account successfully activated");
        }

        return redirect(route('login'))->with("error","Invalid token or email");
    }

    // public function defaultAdminsetUp()
    // {
    //     /**
    //      * Check if maintaner has been set
    //      */
    //     if(User::where('email', 'admin@admin.com')->exists())
    //     {
    //         $default = '
    //                     <h1>Account Exists, please login</h1>
    //                     <br>
    //                     <script>
    //                     // if(document.readyState === "complete") 
    //                     // {
    //                         swal("Account Exists, please login.");
    //                     // }
    //                 </script>';
    //         return view('login')->with(compact('default'));
    //     }
    //     else{
    //         $maintainer = new User();
    //         $maintainer->password = Hash::make('!12345678');
    //         $maintainer->email = 'admin@admin.com';
    //         $maintainer->name = 'James Collins';
    //         $maintainer->save();
    //     }
    // }
}
