<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $post = Post::where('user_id', auth()->user()->id);
        return view('dashboard.post.index', [
            'title' => 'Pers pergerakan | My Post',
            'posts' => $post->latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dashboard.post.create', [
            'title' => 'Pers pergerakan | Create post',
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'body' => 'required',
            'image' => 'image|file|max:2045',
            'category_id' => 'required'
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-image');
        }

        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 50, '...');
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['world'] =  $request->world;

        Post::create($validatedData);

        return redirect('/dashboard/post')->with('message', '<div class="alert alert-success" role="alert">
        Post has been created!
      </div>');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
        return view('dashboard.post.detail', [
            'title' => 'Pers pergerakan | Detail post',
            'post' => $post,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
        return view('dashboard.post.edit', [
            'title' => 'Pers pergerakan | Edit post',
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //

        $rules = [
            'title' => 'required|max:255',
            'body' => 'required',
            'category_id' => 'required',
            'image' => 'image|file|max:2045',
        ];

        if ($post->slug != $request->slug) {
            $rules['slug'] = 'required|unique:posts';
        }

        $validatedData = $request->validate($rules);
        if ($request->file('image')) {
            if ($post->image) {
                Storage::delete($post->image);
            }
            $validatedData['image'] = $request->file('image')->store('post-image');
        }
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 50, '...');
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['world'] =  $request->world;

        Post::where('id', $post->id)
            ->update($validatedData);

        return redirect('/dashboard/post')->with('message', '<div class="alert alert-success" role="alert">
        Post has been updated!
      </div>');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
        if ($post->image) {
            Storage::delete($post->image);
        }
        Post::destroy($post->id);
        return redirect('/dashboard/post')->with('message', '<div class="alert alert-success" role="alert">
        Post has been deleted!
      </div>');
    }
    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
