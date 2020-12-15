<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id=auth()->user()->id;
        $user=User::find($user_id);
        $posts=Post::all();
        $is_admin=false;
        if($user->isAdmin)
            $is_admin=true;
        $total_users=User::all();
        $total_posts=Post::all();
        $users_today=count($total_users);
        $users_month=count($total_users);

        $total_posts=count($total_posts);
        $total_users=count($total_users);

        $current_date=date('Y-m-d');
        $current_month=$current_date[5].$current_date[6];

        if($user->isAdmin)
            return view('adminPages.homepage',compact('total_users','total_posts','users_today','users_month'));

        // if($user->isAdmin)            
        //     return view('adminPages.homepage')->with('posts',$user->posts);

        else
            return view('postpage',compact('posts','is_admin'));
    }
}
