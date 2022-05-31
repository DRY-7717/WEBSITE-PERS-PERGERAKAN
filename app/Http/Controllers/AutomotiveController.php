<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class AutomotiveController extends Controller
{
    //
    public function index()
    {


        return view('automotive.index', [
            'title' => 'Pers pergerakan | Technology',
            'bigtitle' => 'Automotive',
            'autoside' => Post::latest()->where('category_id', 3)->paginate(5),
            'auto' => Post::latest()->where('category_id', 3)->paginate(25),
            'users' => User::all(),
            'categories' => Category::all(),
        ]);
    }

    public function searchautomotive()
    {
        $posts = Post::where('category_id', 3)->latest();
        $title = '';

        if (request('user')) {
            $user = User::firstWhere('username', request('user'));
            $title = 'by ' . $user->name;
        }
        return view('automotive.search', [
            'bigtitle' => 'Automotive news ' . $title,
            'title' => 'Pers pergerakan | Search automotive news',
            'auto' =>  $posts->filter(request(['search',  'user']))->get(),
            'users' => User::all(),
            'categories' => Category::all(),
        ]);
    }
}
