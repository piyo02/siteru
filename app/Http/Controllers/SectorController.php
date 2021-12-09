<?php

namespace App\Http\Controllers;

use \Cviebrock\EloquentSluggable\Services\SlugService;
use App\Models\Sector;
use App\Models\SectorContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = auth()->user()->role->name;
        $sector_id = auth()->user()->sector_id;

        if( $role == 'User Sector' ){
            $sectors = Sector::where('id', $sector_id)->latest()->paginate(10);
        } else {
            $sectors = Sector::latest()->paginate(10);
        }

        return view('pages.sectors.index', [
            'sectors' => $sectors,
            'page' => 'Organisasi'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.sectors.form', [
            'page' => 'Tambah Organisasi',
            'action' => '/admin/sectors/',
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
            'name' => 'required|max:255|unique:sectors',
            'structure' => 'image|file',
        ]);

        try {
            // dd($validatedData);
            Sector::create($validatedData);
            $status = 'success';
            $message = 'Berhasil Membuat Organisasi';
        } catch (\Exception $exception) {
            // dd($exception);
            $status = 'error';
            $message = 'Gagal Membuat Organisasi';
        }

        return redirect('/admin/sectors')->with($status, $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sector  $sector
     * @return \Illuminate\Http\Response
     */
    public function show(Sector $sector)
    {
        try {
            $program    = Storage::disk('local')->get($sector->program);
            $job        = Storage::disk('local')->get($sector->job);
            $purpose    = Storage::disk('local')->get($sector->purpose);
        } catch (\Exception $exception) {
            $program    = Storage::disk('local')->get('public/uploads/programs/program.html');
            $job        = Storage::disk('local')->get('public/uploads/jobs/job.html');
            $purpose    = Storage::disk('local')->get('public/uploads/purposes/purpose.html');
            // return redirect('/admin/sectors')->with('error', 'File Bidang "' . $sector->name . '" tidak ditemukan');
        }
        return view('pages.sectors.detail', [
            'sector'    => $sector,
            'page'      => $sector->name,
            'program'   => $program,
            'job'       => $job,
            'purpose'   => $purpose,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sector  $sector
     * @return \Illuminate\Http\Response
     */
    public function edit(Sector $sector)
    {
        try {
            $program_content= file_get_contents(\storage_path('app/'.$sector->program));
            $job_content    = file_get_contents(\storage_path('app/'.$sector->job));
            $purpose_content= file_get_contents(\storage_path('app/'.$sector->purpose));
        } catch (\Exception $exception) {
            $program_content= '';
            $job_content    = '';
            $purpose_content= '';
            // return redirect('/admin/sectors')->with('error', 'File Bidang "' . $sector->name . '" tidak ditemukan');
        }
        return view('pages.sectors.form', [
            'page' => 'Edit Organisasi',
            'sector' => $sector,
            'action' => '/admin/sectors/' . $sector->id,
            'program_content' => $program_content,
            'job_content' => $job_content,
            'purpose_content' => $purpose_content,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sector  $sector
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sector $sector)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'structure' => 'image|file',
        ]);

        $filename = Str::slug($request->name, '-') . '.html';
        $path = "public/uploads/sectors/$filename";
        if( $request->file('structure') ){
            $validatedData['structure'] = $request->file('structure')->store('images/structures');
        }
        // upload
        if( Storage::disk('local')->put("public/uploads/sectors/programs/$filename", $request->program) ){
            $validatedData['program'] = "public/uploads/sectors/programs/$filename";
        }
        if( Storage::disk('local')->put("public/uploads/sectors/jobs/$filename", $request->job) ){
            $validatedData['job'] = "public/uploads/sectors/jobs/$filename";
        }
        if( Storage::disk('local')->put("public/uploads/sectors/purposes/$filename", $request->purpose) ){
            $validatedData['purpose'] = "public/uploads/sectors/purposes/$filename";
        }

        try {
            Sector::where('id', $sector->id)->update($validatedData);
            $status = 'success';
            $message = 'Berhasil Membuat Organisasi';
        } catch (\Exception $exception) {
            $status = 'error';
            $message = 'Gagal Membuat Organisasi';
        }

        return redirect('/admin/sectors')->with($status, $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sector  $sector
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sector $sector)
    {
        // try {
        //     DB::transaction(function() use($sector) {
        //         SectorContact::where('sector_id', $sector->id)->delete();

        //     });
        // } catch (\Exception $ex) {
            
        // }
        try {
            // Sector::where('id', $sector->id)->delete();
            Sector::destroy($sector->id);
            $status = 'success';
            $message = 'Berhasil Menghapus Organisasi';
        } catch (\Exception $exception) {
            $status = 'error';
            $message = 'Gagal Menghapus Organisasi';
        }

        return redirect('/admin/sectors')->with($status, $message);
    }
}
