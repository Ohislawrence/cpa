<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Fortify;
use Laravel\Fortify\Http\Requests\LoginRequest;

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

    public function offers()
    {
        return view('frontpages.offers');
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

        // Attempt to authenticate the user
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Authentication passed; regenerate the session
           
            //dd($request->session()->get(''));

            //return redirect()->intended('dashboard')->with('success', 'Logged in successfully!');
            return redirect(route('merchant.dashboard'));
            // Authentication failed; return with error
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
        }
    }

    public function logintest(){
        return view('frontpages.login');
    }

    public function logout(Request $request)
    {
        return redirect('login')->with(Auth::logout());
    }
}

