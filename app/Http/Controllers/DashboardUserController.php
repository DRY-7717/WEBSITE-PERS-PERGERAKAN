<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class DashboardUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('dashboard.user.index', [
            'title' => 'Pers pergerakan | My profile',
            'posts' => Post::where('user_id', auth()->user()->id)->get(),
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
        $validatedData =  $request->validate([
            'name' => 'required|max:255',
            'komisariat' => 'required',
            'alamat' => 'required',
            'ttl'  => 'required',
            'image' => 'image|file|max:2045'
        ]);

        if ($request->file('image')) {
            if ($user->image) {
                Storage::delete($user->image);
            }

            $validatedData['image'] = $request->file('image')->store('user-image');
        }

        User::where('id', $user->id)
            ->update($validatedData);

        return redirect('/dashboard/user')->with('message', '<div class="alert alert-success " role="alert">
        Your profile has been updated!
        </div>');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
    public function editpassword()
    {
        return view('dashboard.user.editpassword', [
            'title' => 'PMII Cabang Ciputat | Change Password',
        ]);
    }
    public function changepassword(Request $request, User $user)
    {
        $request->validate([
            'cpassword' => 'required',
            'password' => 'required|min:6',
            'password2' => 'required|min:6|same:password',
        ]);

        $cpassword = $request->cpassword;
        $password = $request->password;
        if (!Hash::check($cpassword, $user->password)) {
            return redirect('/dashboard/user/changepassword')->with('message', '<div class="alert alert-danger" role="alert">
            Current password and new password not same !
          </div>');
        } else {
            if ($cpassword == $password) {
                return redirect('/dashboard/user/changepassword')->with('message', '<div class="alert alert-danger" role="alert">
                New Password cannot be same as your current password
          </div>');
            } else {
                $user->password = Hash::make($password);
                $user->save();
                return redirect('/dashboard/user')->with('message', '<div class="alert alert-success" role="alert">
                Your password has been changed
          </div>');
            }
        }
    }
}
