<?php

namespace App\Http\Controllers;

use App\Models\Config;
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
        $types = Config::where('shortcode', 'like', 'TP-INF')->get();
        $infrastructures = Infrastructure::latest()->paginate(10);
        $sectors = Sector::all();
        return view('pages.infrastructures.index', [
            'page' => 'Infrastruktur',
            'infrastructures' => $infrastructures,
            'sectors' => $sectors,
            'types' => $types,
        ]);
    }

    public function create()
    {
        $types = Config::where('shortcode', 'like', 'TP-INF')->get();
        $sectors = Sector::all();
        return view('pages.infrastructures.form', [
            'page' => 'Infrastruktur',
            'action' => '/admin/infrastructure/',
            'types' => $types,
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
            'description' => 'required',
        ]);

        if( $request->file('image') ){
            $validatedData['image'] = $request->file('image')->store('images/publish/infrasctructures');
        }

        $validatedData['sector_id'] = $request->sector_id;
        $validatedData['config_id'] = $request->type_id;

        Infrastructure::create($validatedData);
        return redirect('/admin/infrastructure')->with('success', 'Berhasil');
    }

    public function edit(Infrastructure $infrastructure)
    {
        return view('pages.infrastructures.form', [
            'page' => 'Edit Infrastruktur',
            'news' => $news,
            'action' => '/admin/publication/news/' . $news->id,
            'news_content' => file_get_contents(\storage_path('app/'.$news->file)),
        ]);
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
            'description' => 'required',
        ]);

        if( $request->file('image') ){
            $validatedData['image'] = $request->file('image')->store('images/publish/infrasctructures');
        }

        $validatedData['sector_id'] = $request->sector_id;
        $validatedData['config_id'] = $request->type_id;
        
        Infrastructure::where('id', $infrastructure->id)
            ->update($validatedData);
        
        return redirect('/admin/infrastructure')->with('success', 'Berhasil');
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
        return redirect('/admin/infrastructure/')->with('success', 'Berhasil');
    }
}
