<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile = Profile::first();
        return view('pages.profile', [
            'page' => 'Profil Dinas PU',
            'profile' => $profile,
            'profile_content' => Storage::disk('local')->get($profile->explanation)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        $profile = Profile::first();
        return view('pages.form-profile', [
            'page' => 'Profil Dinas PU',
            'profile' => $profile,
            'profile_content' => Storage::disk('local')->get($profile->explanation)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        $validatedData = $request->validate([
            'vision' => 'required',
            'mission' => 'required',
            'structure' => 'image|file',
        ]);

        if( $request->file('structure') ){
            $validatedData['structure'] = $request->file('structure')->store('images/structures/');
        }

        if( Storage::disk('local')->put('public/uploads/profile.html', $request->explanation) ){
            $validatedData['explanation'] = 'public/uploads/profile.html';
        }
        Profile::where('id', $profile->id)
            ->update($validatedData);
        return redirect('/admin/master/profile');
    }
}
