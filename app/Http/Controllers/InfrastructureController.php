<?php

namespace App\Http\Controllers;

use App\Models\Sector;
use Illuminate\Http\Request;
use App\Models\Infrastructure;

class InfrastructureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $infrastructures = Infrastructure::latest()->paginate(10);
        $sectors = Sector::all();
        return view('pages.infrastructures.index', [
            'page' => 'Infrastruktur',
            'infrastructures' => $infrastructures,
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
            'name' => 'required',
            'address' => 'required',
            'year' => 'required',
            'duration' => 'required',
            'long' => 'required',
            'lat' => 'required',
            'description' => 'required',
        ]);

        if( $request->file('image') ){
            $validatedData['image'] = $request->file('image')->store('images/publish/infrasctructures');
        }

        $validatedData['sector_id'] = $request->sector_id;

        Infrastructure::create($validatedData);
        return redirect('/admin/master/infrastructure')->with('success', 'Berhasil');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Infrastructure  $infrastructure
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Infrastructure $infrastructure)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'year' => 'required',
            'duration' => 'required',
            'long' => 'required',
            'lat' => 'required',
            'description' => 'required',
        ]);

        if( $request->file('image') ){
            $validatedData['image'] = $request->file('image')->store('images/publish/infrasctructures');
        }
        $validatedData['sector_id'] = $request->sector_id;

        Infrastructure::where('id', $infrastructure->id)
            ->update($validatedData);
        
        return redirect('/admin/master/infrastructure')->with('success', 'Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Infrastructure  $infrastructure
     * @return \Illuminate\Http\Response
     */
    public function destroy(Infrastructure $infrastructure)
    {
        Infrastructure::destroy($infrastructure->id);
        return redirect('/admin/master/infrastructure/')->with('success', 'Berhasil');
    }
}
