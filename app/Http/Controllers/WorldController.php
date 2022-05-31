<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class WorldController extends Controller
{
    //
    public function index()
    {


        $posts = Post::where('world', 1)->latest();

        return view('world.index', [
            'title' => 'Pers pergerakan | World news',
            'world' => $posts->paginate(25)->withQueryString(),
            'worldside' => $posts->paginate(5)->withQueryString(),
            'users' => User::all(),
            'categories' => Category::all(),
        ]);
    }

    public function searchworld()
    {
        $posts = Post::where('world', 1)->latest();
        $title = '';

        if (request('user')) {
            $user = User::firstWhere('username', request('user'));
            $title = 'by ' . $user->name;
        }
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = 'in ' . $category->name;
        }
        if (request('user') && request('category')) {
            $user = User::firstWhere('username', request('user'));
            $category = Category::firstWhere('slug', request('category'));
            $title = 'by ' . $user->name . ' in ' . $category->name;
        }
        return view('world.search', [
            'bigtitle' => 'World news ' . $title,
            'title' => 'Pers pergerakan | Search world news',
            'world' =>  $posts->filter(request(['search', 'category', 'user']))->get(),
            'users' => User::all(),
            'categories' => Category::all(),
        ]);
    }
}
