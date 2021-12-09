<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Sector;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role_user = auth()->user()->role_id;
        $users = User::where('role_id', '>',  $role_user)->paginate(10);

        return view('pages.users.index', [
            'page' => 'User',
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::where('id', '>', 2)->get();
        $sectors = Sector::where('id', '>', 1)->get();
        return view('pages.users.form', [
            'action' => '/admin/master/users/',
            'page' => 'User',
            'roles' => $roles,
            'sectors' => $sectors,
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
        $validatedData = $request->validate([
            'address' => 'required',
            'email' => 'required|unique:users|email:dns',
            'name' => 'required|max:255',
            'phone' => 'required|unique:users',
            'role_id' => 'required',
            'sector_id' => 'required',
        ]);
        $password = substr( $request->email, 0, strpos( $request->email, "@" ) );
        $validatedData['password'] = \bcrypt( $password );
        // dd($validatedData);
        User::create($validatedData);
        return redirect('/admin/master/users')->with('success', 'Berhasil');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::where('id', '>', 2)->get();
        $sectors = Sector::all();

        return view('pages.users.form', [
            'page' => 'Edit User',
            'sectors' => $sectors,
            'user' => $user,
            'roles' => $roles,
            'action' => '/admin/master/users/' . $user->id,
        ]);
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
        $validatedData = $request->validate([
            'address' => 'required',
            'name' => 'required|max:255',
            // 'phone' => 'required|unique:users',
            'role_id' => 'required',
            'sector_id' => 'required',
        ]);

        User::where('id', $user->id)
            ->update($validatedData);
        return redirect('/admin/master/users')->with('success', 'Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);
        return redirect('/admin/master/users')->with('success', 'Berhasil');
    }
}
