<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

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
}
