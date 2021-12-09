<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        // dd( $user );
        return view('pages.users.profile', [
            'user' => $user,
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
            'name' => 'required|max:255',
            'phone' => 'required',
            'address' => 'required',
        ]);

        try {
            User::where('id', $user->id)->update($validatedData);
            $status = 'success';
            $message = 'Berhasil Mengupdate Profil';
        } catch (\Exception $exception) {
            $status = 'error';
            $message = 'Gagal Mengupdate Profil';
        }

        return redirect('/admin/user-profile')->with($status, $message);
    }

    public function change_password(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'password' => 'required|same:confirm',
            'confirm' => 'required',
        ]);

        $validatedData = [
            'password' => \bcrypt( $request->password )
        ];
        
        try {
            User::where('id', $user->id)->update($validatedData);
            $status = 'success';
            $message = 'Berhasil Mengubah Password';
        } catch (\Exception $exception) {
            dd( $exception );
            $status = 'error';
            $message = 'Gagal Mengubah Password';
        }

        return redirect('/admin/user-profile')->with($status, $message);
    }

    public function change_profile_image(Request $request, User $user)
    {
        $old_image = $user->image;
        $validatedData = $request->validate([
            'image' => 'image|file',
        ]);

        if( $request->file('image') ){
            $validatedData['image'] = $request->file('image')->store('images/users');
        }

        try {
            User::where('id', $user->id)->update($validatedData);
            $status = 'success';
            $message = 'Berhasil Mengupdate Foto Profil';
        } catch (\Exception $exception) {
            $status = 'error';
            $message = 'Gagal Mengupdate Foto Profil';
        }

        try {
            if( $old_image != 'images/users/user.jpg' ){
                unlink( \storage_path( 'app/public/' . $old_image ) );
            }
        } catch (\Throwable $th) {
            $status_ = 'error';
            $message_ = 'Gagal Menghapus Foto Profil';
        }

        return redirect('/admin/user-profile')->with($status, $message);
    }
}
