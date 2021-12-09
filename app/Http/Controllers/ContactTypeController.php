<?php

namespace App\Http\Controllers;

use App\Models\ContactType;
use Illuminate\Http\Request;

class ContactTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact_types = ContactType::all();
        return view('pages.contacts.index', [
            'page' => 'Kontak',
            'contact_types' => $contact_types,
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
            'type' => 'required',
            'icon' => 'image|file|max:1024',
        ]);

        if( $request->file('icon') ){
            $validatedData['icon'] = $request->file('icon')->store('images/icons');
        }

        ContactType::create($validatedData);
        return redirect('/admin/master/contacts')->with('success', 'Berhasil');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ContactType  $contactType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContactType $contactType)
    {
        $validatedData = $request->validate([
            'type' => 'required',
            'icon' => 'image|file|max:1024',
        ]);        

        if( $request->file('icon') ){
            $validatedData['icon'] = $request->file('icon')->store('images/icons');
        }

        ContactType::where('id', $contactType->id)
            ->update($validatedData);
        
        return redirect('/admin/master/contacts')->with('success', 'Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ContactType  $contactType
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContactType $contactType)
    {
        ContactType::destroy($contactType->id);
        return redirect('/admin/master/contacts/')->with('success', 'Berhasil');
    }
}
