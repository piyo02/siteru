<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Sector;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class GalleryController extends Controller
{
    public $role;
    public $sector_id;

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $this->role = Auth::user()->role->name;
            $this->sector_id = Auth::user()->sector_id;
            
            return $next($request);
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if( $this->role == 'User Sector' ){
            $galleries = Gallery::where('sector_id', $this->sector_id)->with('sector')->latest()->paginate(10);
        } else {
            $galleries = Gallery::with('sector')->latest()->paginate(10);
        }
        return view('pages.galleries.index', [
            'galleries' => $galleries,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if( $this->role == 'User Sector' ){
            $sectors = Sector::where('id', $this->sector_id)->get();
        } else {
            $sectors = Sector::all();
        }
        return view('pages.galleries.form', [
            'page' => 'Tambah Galeri',
            'action' => '/admin/publication/galleries/',
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
            'sector_id' => 'required',
            'title' => 'required',
            'thumbnail' => 'image|file|max:1024',
        ]);
        $slug = \Str::slug($request->title, '-');

        try {
            $validatedData['slug'] = $slug;
            $validatedData['created_by'] = auth()->user()->id;
            $validatedData['sector_id'] = $request->sector_id;

            Gallery::create($validatedData);
            $status = 'success';
            $message = 'Berhasil Membuat Galeri';
        } catch (\Exception $exception) {
            // dd($exception);
            $status = 'error';
            $message = 'Gagal Membuat Galeri';
        }

        return redirect('/admin/publication/galleries')->with($status, $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        try {
            $gallery_content = Storage::disk('local')->get($gallery->file);
        } catch (\Exception $exception) {
            $gallery_content = Storage::disk('local')->get('public/uploads/galleries/galleries.html');
        }
        return view('pages.galleries.detail', [
            'page' => $gallery->title,
            'gallery' => $gallery,
            'gallery_content' => $gallery_content
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        if( $this->role == 'User Sector' ){
            $sectors = Sector::where('id', $this->sector_id)->get();
        } else {
            $sectors = Sector::all();
        }
        return view('pages.galleries.form', [
            'page' => 'Edit Galeri',
            'gallery' => $gallery,
            'action' => '/admin/publication/galleries/' . $gallery->id,
            'gallery_content' => file_get_contents(\storage_path('app/'.$gallery->file)),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'thumbnail' => 'image|file|max:1024',
        ]);

        if( $request->file('thumbnail') ){
            $validatedData['thumbnail'] = $request->file('thumbnail')->store('images/publish/galleries');
        }

        if( $gallery->file == 'public/uploads/galleries/galleries.html' ){
            $path = 'public/uploads/galleries/' . $gallery->slug . '.html';
        }else {
            $path = $gallery->file;
        }
        
        if( Storage::disk('local')->put($path, $request->file_gallery) ){
            $validatedData['file'] = $path;
        }

        try {
            Gallery::where('id', $gallery->id)->update($validatedData);
            $status = 'success';
            $message = 'Berhasil Mengupdate Berita';
        } catch (\Exception $exception) {
            $status = 'error';
            $message = 'Gagal Mengupdate Berita';
        }
        return redirect('/admin/publication/galleries')->with($status, $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        Gallery::destroy($gallery->id);
        return redirect('/admin/publication/galleries')->with('success', 'Berhasil');
    }
}
