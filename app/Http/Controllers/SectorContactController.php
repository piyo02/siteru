<?php

namespace App\Http\Controllers;

use App\Models\Sector;
use Illuminate\Http\Request;
use App\Models\SectorContact;
use App\Models\ContactType;

class SectorContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Sector $sector)
    {
        $sector_contacts = SectorContact::where('sector_id', $sector->id)->paginate(10);
        return view('pages.sectors.contact', [
            'sector_contacts' => $sector_contacts,
            'page' => 'Kontak ' . $sector->name,
            'contact_types' => ContactType::all(),
            'sector_id' => $sector->id,
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
            'contact_type_id' => 'required',
            'sector_id' => 'required',
            'contact' => 'required',
        ]);

        SectorContact::create($validatedData);
        return redirect('/admin/sector-contract/' . $request->sector_id)->with('success', 'Berhasil');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SectorContact  $sectorContact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SectorContact $sectorContact)
    {
        $validatedData = $request->validate([
            'contact_type_id' => 'required',
            'sector_id' => 'required',
            'contact' => 'required',
        ]);

        SectorContact::where('id', $sectorContact->id)
                    ->update($validatedData);
        return redirect('/admin/sector-contract/' . $request->sector_id)->with('success', 'Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SectorContact  $sectorContact
     * @return \Illuminate\Http\Response
     */
    public function destroy(SectorContact $sectorContact)
    {
        SectorContact::destroy($sectorContact->id);
        return redirect('/admin/sector-contract/' . $sectorContact->sector->id)->with('success', 'Berhasil');
    }
}
