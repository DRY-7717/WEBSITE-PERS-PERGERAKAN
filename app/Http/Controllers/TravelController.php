<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class TravelController extends Controller
{
    //
    public function index()
    {


        return view('travel.index', [
            'title' => 'Pers pergerakan | Travel',
            'bigtitle' => 'Travel',
            'travelside' => Post::latest()->where('category_id', 9)->paginate(5),
            'travels' => Post::latest()->where('category_id', 9)->paginate(25),
            'users' => User::all(),
            'categories' => Category::all(),
        ]);
    }

    public function searchtravel()
    {
        $posts = Post::where('category_id', 9)->latest();
        $title = '';

        if (request('user')) {
            $user = User::firstWhere('username', request('user'));
            $title = 'by ' . $user->name;
        }
        return view('travel.search', [
            'bigtitle' => 'Travel news ' . $title,
            'title' => 'Pers pergerakan | Search travel news',
            'travels' =>  $posts->filter(request(['search',  'user']))->get(),
            'users' => User::all(),
            'categories' => Category::all(),
        ]);
    }
}
