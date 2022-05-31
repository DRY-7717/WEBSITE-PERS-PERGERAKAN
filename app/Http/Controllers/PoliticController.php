<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PoliticController extends Controller
{
    //
    public function index()
    {


        return view('politic.index', [
            'title' => 'Pers pergerakan | Politic',
            'bigtitle' => 'Politic',
            'politicside' => Post::latest()->where('category_id', 7)->paginate(5),
            'politics' => Post::latest()->where('category_id', 7)->paginate(25),
            'users' => User::all(),
            'categories' => Category::all(),
        ]);
    }

    public function searchpolitic()
    {
        $posts = Post::where('category_id', 7)->latest();
        $title = '';

        if (request('user')) {
            $user = User::firstWhere('username', request('user'));
            $title = 'by ' . $user->name;
        }
        return view('politic.search', [
            'bigtitle' => 'Politic news ' . $title,
            'title' => 'Pers pergerakan | Search politic news',
            'politics' =>  $posts->filter(request(['search',  'user']))->get(),
            'users' => User::all(),
            'categories' => Category::all(),
        ]);
    }
}
