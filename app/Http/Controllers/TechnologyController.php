<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class TechnologyController extends Controller
{
    //
    public function index()
    {


        return view('technology.index', [
            'title' => 'Pers pergerakan | Technology',
            'bigtitle' => 'Technology',
            'techside' => Post::latest()->where('category_id', 1)->paginate(5),
            'tech' => Post::latest()->where('category_id', 1)->paginate(25),
            'users' => User::all(),
            'categories' => Category::all(),
        ]);
    }

    public function searchtechnology()
    {
        $posts = Post::where('category_id', 1)->latest();
        $title = '';

        if (request('user')) {
            $user = User::firstWhere('username', request('user'));
            $title = 'by ' . $user->name;
        }
        return view('technology.search', [
            'bigtitle' => 'Technology news ' . $title,
            'title' => 'Pers pergerakan | Search technology news',
            'tech' =>  $posts->filter(request(['search',  'user']))->get(),
            'users' => User::all(),
            'categories' => Category::all(),
        ]);
    }
}
