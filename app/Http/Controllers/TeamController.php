<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Region;
use Illuminate\Http\Request;
use App\Models\RegionCoordinate;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::all();
        return view('pages.teams.index', [
            'page' => 'Tim',
            'teams' => $teams,
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
        ]);
        $slug = \Str::slug($request->name, '-');

        $validatedData['slug'] = $slug;
        Team::create($validatedData);
        return redirect('/admin/master/teams')->with('success', 'Berhasil');
    }

    public function show(Team $team)
    {
        $regions = Region::where('team_id', $team->id)->get();
        return view('pages.teams.region', [
            'page' => 'Wilayah ' . $team->name,
            'team_id' => $team->id,
            'regions' => $regions,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);
        $slug = \Str::slug($request->name, '-');

        $validatedData['slug'] = $slug;
        Team::where('id', $team->id)
            ->update($validatedData);
        
        return redirect('/admin/master/teams')->with('success', 'Berhasil');
    }

    public function store_region(Request $request)
    {
        $validatedData = $request->validate([
            'province' => 'required',
            'city' => 'required',
            'district' => 'required',
            'village' => 'required',
            'year' => 'required',
            'Shape_Leng' => 'required',
            'Shape_Area' => 'required',
            'color' => 'required',
            'source' => 'required',
            'team_id' => 'required',
        ]);

        Region::create($validatedData);
        return redirect('/admin/master/teams/' . $request->team_id)->with('success', 'Berhasil');
    }

    public function update_region(Request $request, Region $region)
    {
        $validatedData = $request->validate([
            'province' => 'required',
            'city' => 'required',
            'district' => 'required',
            'village' => 'required',
            'year' => 'required',
            'Shape_Leng' => 'required',
            'Shape_Area' => 'required',
            'color' => 'required',
            'source' => 'required',
        ]);

        Region::where('id', $region->id)
            ->update($validatedData);
        
        return redirect('/admin/master/teams/' . $region->team_id )->with('success', 'Berhasil');
    }

    public function destroy_region(Region $region)
    {
        RegionCoordinate::destroy('region_id', $region->id);
        Region::destroy($region->id);
        return redirect('/admin/master/teams/' . $region->team_id)->with('success', 'Berhasil');
    }

    public function show_region(Region $region)
    {
        $coordinates = RegionCoordinate::where('region_id', $region->id)->get();
        return view('pages.teams.coordinate', [
            'page' => 'Koordinat Wilayah ' . $region->village,
            'region_id' => $region->id,
            'team_id' => $region->team_id,
            'coordinates' => $coordinates,
        ]);
    }

    public function store_coordinate(Request $request)
    {
        $validatedData = $request->validate([
            'long' => 'required',
            'region_id' => 'required',
            'lat' => 'required',
        ]);

        RegionCoordinate::create($validatedData);
        return redirect('/admin/master/regions/' . $request->region_id)->with('success', 'Berhasil');
    }

    public function update_coordinate(Request $request, RegionCoordinate $regionCoordinate)
    {
        $validatedData = $request->validate([
            'long' => 'required',
            'lat' => 'required',
        ]);

        RegionCoordinate::where('id', $regionCoordinate->id)
            ->update($validatedData);
        
        return redirect('/admin/master/regions/' . $regionCoordinate->region_id)->with('success', 'Berhasil');
    }

    public function destroy_coordinate(RegionCoordinate $regionCoordinate)
    {
        RegionCoordinate::destroy($regionCoordinate->id);
        return redirect('/admin/master/regions/' . $regionCoordinate->region_id)->with('success', 'Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Team $team)
    // {
    //     Team::destroy($team->id);
    //     return redirect('/admin/master/teams/')->with('success', 'Berhasil');
    // }
}
