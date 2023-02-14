<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User;

class UsersController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    public function users_lists()
    {
        $users_lists = DB::table('users')->orderBy('id', 'DESC')->paginate(10);
        return
            view('auth.users',compact('users_lists'));
    }

    public function edit($id)
    {
        //
        $user = User::findOrFail($id);

        return view('auth.user-edit', compact('user'));
    }

    public function update(UsersRequest $request)
    {
        //
        $id = $request->input('id');
        
        $password = $request->input('password');

        $passwordhash = Hash::make($password);

        DB::update('update users set password = ? where id = ?', [$passwordhash, $id]);

        return back()->with('success', 'Updated Admin Data Successfully');
    }

    public function destroy($id)
    {
        User::whereId($id)->delete();

        return redirect('/users');
    }
}
