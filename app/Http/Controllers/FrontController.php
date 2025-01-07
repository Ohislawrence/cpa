<?php

namespace App\Http\Controllers;

use App\Mail\ResetEmail;
use App\Models\Blog;
use App\Models\Feature;
use App\Models\Plan;
use App\Models\Planfeature;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Container\Attributes\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Fortify;
use Laravel\Fortify\Http\Requests\LoginRequest;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Validation\Rules\Password;

class FrontController extends Controller
{
    public function home()
    {
        return view('frontpages.home');
    }

    public function aboutus()
    {
        return view('frontpages.aboutus');
    }

    public function affiliates()
    {
        return view('frontpages.affiliate');
    }

    public function advertisers()
    {
        return view('frontpages.advertiser');
    }

    public function pricing()
    {
        $plans = Plan::all();
        $features = Feature::all();
        $plafeatures = Planfeature::all();
        return view('frontpages.pricing', compact('plans','plafeatures','features'));
    }

    public function blogs()
    {
        $blogs = Blog::latest()->paginate(9);
        return view('frontpages.blogs.list' , compact('blogs'));
    }

    public function blogsingle(Request $request, $slug)
    {
        $blog = Blog::where('slug', $request->slug)->first();
        return view('frontpages.blogs.single', compact('blog'));
    }

    public function privacy()
    {
        return view('frontpages.privacy');
    }

    public function tos()
    {
        return view('frontpages.tos');
    }

    public function support()
    {
        return view('frontpages.support');
    }

    public function contactus()
    {
        return view('frontpages.contactus');
    }

    public function error()
    {
        return view('frontpages.error');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $user = User::where('email', $request->email)->first();
        //$db = \DB::connection()->getDatabaseName();
        //dd($db);

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::attempt(['email' => $request->email, 'password' => $request->password]);
            return redirect(route('dashboard'));
        }else{

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
        }
        
    }

    public function logintest(){
        return view('frontpages.login');
    }

    public function passwordreset()
    {
        return view('frontpages.passwordreset');
    }

    public function passwordresetpost(Request $request)
    {
        //dd(Carbon::now()->lt(Carbon::now()->addMinutes(10)));
        // Validate the email input
        $request->validate([
            'email' => 'required|email',
        ]);

        // Check if the email exists in the users table
        $exists = User::where('email', $request->email)->exists();

        if ($exists) {
            $UniqueCode = $this->generateUniqueCode();
            $user = User::where('email', $request->email)->first();
            $user->two_factor_secret = $UniqueCode;
            $user->two_factor_confirmed_at = Carbon::now()->addMinutes(30);
            $user->save();

            

            $resetURL = route('url.password.reset', ['codes' => $UniqueCode]);

            Mail::to($user->email)->queue(new ResetEmail($user, $resetURL));

            return back()->with('message', 'check your email for your password reset link, it expires in 30 minute.');
        }else{
            return back()->with('message', 'The email you entered does not match any account, kindly check the email.');
        }
        
    }


    public function passwordreseturl(Request $request)
    {
        $codes = $request->codes;
        $resetuser = User::where('two_factor_secret', $codes)->first();
        $time = $resetuser->two_factor_confirmed_at;
        
        if ($resetuser)
        {
            if(Carbon::now()->lt($time)){
                return view('frontpages.enternewpassword', compact('codes'));
            }else{
                return response()->json(['error' => 'This link is expired, request a new reset link or contact us.'], Response::HTTP_FORBIDDEN);
            }
            
        }
        
    }

    public function passwordresetfinalpost(Request $request)
    {
        // Validate the email input
        
        $codes = $request->codeme;
        $resetuser = User::where('two_factor_secret', $codes)->first();

        $resetuser->update([
            'password'=> Hash::make($request->password),
        ]);

        return redirect()->route('login.test')->with('message', 'Password reset done, you can log in.');
    }

    public function logout(Request $request)
    {
        return redirect()->route('login.test')->with(Auth::logout());
    }

    public function generateUniqueCode()
    {
        do {
            $length = 50;
            $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            $randomString = '';
            $maxIndex = strlen($characters) - 1;

            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[random_int(0, $maxIndex)];
            }
        } while (User::where("two_factor_secret", "=", $randomString)->first());

        return $randomString;
    }
}

