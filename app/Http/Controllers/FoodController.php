<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    //
    public function index()
    {


        return view('food.index', [
            'title' => 'Pers pergerakan | Food',
            'bigtitle' => 'Food',
            'foodside' => Post::latest()->where('category_id', 4)->paginate(5),
            'foods' => Post::latest()->where('category_id', 4)->paginate(25),
            'users' => User::all(),
            'categories' => Category::all(),
        ]);
    }

    public function searchfood()
    {
        $posts = Post::where('category_id', 4)->latest();
        $title = '';

        if (request('user')) {
            $user = User::firstWhere('username', request('user'));
            $title = 'by ' . $user->name;
        }
        return view('food.search', [
            'bigtitle' => 'Food news ' . $title,
            'title' => 'Pers pergerakan | Search food news',
            'foods' =>  $posts->filter(request(['search',  'user']))->get(),
            'users' => User::all(),
            'categories' => Category::all(),
        ]);
    }
}
