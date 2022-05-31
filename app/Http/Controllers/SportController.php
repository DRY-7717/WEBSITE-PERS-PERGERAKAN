<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class SportController extends Controller
{
    //
    public function index()
    {


        return view('sport.index', [
            'title' => 'Pers pergerakan | Technology',
            'bigtitle' => 'Sport',
            'sportside' => Post::latest()->where('category_id', 2)->paginate(5),
            'sport' => Post::latest()->where('category_id', 2)->paginate(25),
            'users' => User::all(),
            'categories' => Category::all(),
        ]);
    }

    public function searchsport()
    {
        $posts = Post::where('category_id', 2)->latest();
        $title = '';

        if (request('user')) {
            $user = User::firstWhere('username', request('user'));
            $title = 'by ' . $user->name;
        }
        return view('sport.search', [
            'bigtitle' => 'Sport news ' . $title,
            'title' => 'Pers pergerakan | Search sport news',
            'sports' =>  $posts->filter(request(['search',  'user']))->get(),
            'users' => User::all(),
            'categories' => Category::all(),
        ]);
    }
}
