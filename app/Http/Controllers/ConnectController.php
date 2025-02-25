<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\User; // Pastikan model User diimport

class ConnectController extends Controller
{

    public function index()
    {
        return view('home');
    }
    public function connect()
    {
        return view('connections.index');
    }
    // Mengembalikan halaman suggestions dengan data suggestedUsers yang statis
    public function suggestions()
    {
        $suggestedUsers = [
            [
                'id' => 1,
                'name' => 'Sophia Lee',
                'position' => 'Photographer at Photography',
                'image' => 'img/p1.png',
                'mutual_connections' => 4
            ]
        ];

        return view('connections.suggestions', compact('suggestedUsers'));
    }

    // Mengembalikan halaman suggestions dengan data suggestedUsers dari database
    public function showSuggestedUsers()
    {
        $suggestedUsers = User::all(); // Ambil semua user dari database
        return view('connections.suggestions', ['suggestedUsers' => $suggestedUsers]);
    }

    public function notification()
    {
        return view('connections.notifications');
    }

    public function message()
    {
        return view('connections.messages');
    }

    public function terms()
    {
        return view('terms.term');
    }

    public function job()
    {
        return view('job.jobs');
    }

    public function profile()
    {
        $posts = Post::where('user_id', auth()->id())->latest()->get();

        return view('profile.profile', compact('posts'));
    }

    public function companyProfile()
    {
        $company = Company::where('id', auth()->user()->company_id)->first();

        return view('profile.company-profile', compact('company'));
    }

    public function jobProfile()
    {
        return view('profile.job-profile');
    }

    public function notFound()
    {
        return view('error.not-found');
    }

    public function faq()
    {
        return view('faq.faq');
    }

    public function privacy()
    {
        return view('faq.privacy');
    }

    public function comingSoon()
    {
        return view('errors.coming-soon');
    }

    public function maintenance()
    {
        return view('errors.templates');
    }

    public function blog()
    {
        $blogs = Blog::with('user')->latest()->simplePaginate(6);
        return view('blog.blogs', compact('blogs'));
    }

    public function blogSingle(Blog $blog)
    {
        return view('blog.blog-single', compact('blog'));
    }

    public function createBlog()
    {
        return view('blog.create-blog');
    }

    public function writeBlog()
    {
        return view('blog.write-blog');
    }

    public function formBlog()
    {
        return view('blog.form-blog');
    }

    public function components()
    {
        return view('pricings.components');
    }

    public function pricing()
    {
        return view('pricings.pricing');
    }

    public function contact()
    {
        return view('profile.contact');
    }

    public function signIn()
    {
        return view('login.sign-in');
    }

    public function signUp()
    {
        return view('login.sign-up');
    }

    public function forgotPassword()
    {
        return view('login.forgot-password');
    }

    public function editProfile()
    {
        return view('profile.edit-profile');
    }
}
