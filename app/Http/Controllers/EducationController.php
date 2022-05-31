<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    //
    public function index()
    {


        return view('education.index', [
            'title' => 'Pers pergerakan | Education',
            'bigtitle' => 'Education',
            'educationside' => Post::latest()->where('category_id', 5)->paginate(5),
            'educations' => Post::latest()->where('category_id', 5)->paginate(25),
            'users' => User::all(),
            'categories' => Category::all(),
        ]);
    }

    public function searcheducation()
    {
        $posts = Post::where('category_id', 5)->latest();
        $title = '';

        if (request('user')) {
            $user = User::firstWhere('username', request('user'));
            $title = 'by ' . $user->name;
        }
        return view('education.search', [
            'bigtitle' => 'Education news ' . $title,
            'title' => 'Pers pergerakan | Search education news',
            'educations' =>  $posts->filter(request(['search',  'user']))->get(),
            'users' => User::all(),
            'categories' => Category::all(),
        ]);
    }
}
