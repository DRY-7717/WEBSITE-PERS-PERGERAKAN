<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class HealthController extends Controller
{
    //
    public function index()
    {


        return view('health.index', [
            'title' => 'Pers pergerakan | Health',
            'bigtitle' => 'Health',
            'healthside' => Post::latest()->where('category_id', 10)->paginate(5),
            'healths' => Post::latest()->where('category_id', 10)->paginate(25),
            'users' => User::all(),
            'categories' => Category::all(),
        ]);
    }

    public function searchhealth()
    {
        $posts = Post::where('category_id', 10)->latest();
        $title = '';

        if (request('user')) {
            $user = User::firstWhere('username', request('user'));
            $title = 'by ' . $user->name;
        }
        return view('health.search', [
            'bigtitle' => 'Health news ' . $title,
            'title' => 'Pers pergerakan | Search health news',
            'healths' =>  $posts->filter(request(['search',  'user']))->get(),
            'users' => User::all(),
            'categories' => Category::all(),
        ]);
    }
}
