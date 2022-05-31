<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class EntertaimentController extends Controller
{
    //
    public function index()
    {


        return view('entertaiment.index', [
            'title' => 'Pers pergerakan | Entertaiment',
            'bigtitle' => 'Entertaiment',
            'entertaimentside' => Post::latest()->where('category_id', 8)->paginate(5),
            'entertaiments' => Post::latest()->where('category_id', 8)->paginate(25),
            'users' => User::all(),
            'categories' => Category::all(),
        ]);
    }

    public function searchentertaiment()
    {
        $posts = Post::where('category_id', 8)->latest();
        $title = '';

        if (request('user')) {
            $user = User::firstWhere('username', request('user'));
            $title = 'by ' . $user->name;
        }
        return view('entertaiment.search', [
            'bigtitle' => 'Entertaiment news ' . $title,
            'title' => 'Pers pergerakan | Search entertaiment news',
            'entertaiments' =>  $posts->filter(request(['search',  'user']))->get(),
            'users' => User::all(),
            'categories' => Category::all(),
        ]);
    }
}
