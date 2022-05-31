<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class FinanceController extends Controller
{
    //
    public function index()
    {


        return view('finance.index', [
            'title' => 'Pers pergerakan | Finance',
            'bigtitle' => 'Finance',
            'financeside' => Post::latest()->where('category_id', 6)->paginate(5),
            'finances' => Post::latest()->where('category_id', 6)->paginate(25),
            'users' => User::all(),
            'categories' => Category::all(),
        ]);
    }

    public function searchfinance()
    {
        $posts = Post::where('category_id', 6)->latest();
        $title = '';

        if (request('user')) {
            $user = User::firstWhere('username', request('user'));
            $title = 'by ' . $user->name;
        }
        return view('finance.search', [
            'bigtitle' => 'Finance news ' . $title,
            'title' => 'Pers pergerakan | Search finance news',
            'finances' =>  $posts->filter(request(['search',  'user']))->get(),
            'users' => User::all(),
            'categories' => Category::all(),
        ]);
    }
}
