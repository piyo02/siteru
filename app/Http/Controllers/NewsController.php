<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Sector;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
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
            $news = News::where('sector_id', $this->sector_id)->latest()->paginate(10);
        } else {
            $news = News::latest()->paginate(10);
        }
        return view('pages.news.index', [
            'newses' => $news,
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
        return view('pages.news.form', [
            'page' => 'Tambah Berita',
            'action' => '/admin/publication/news/',
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
            'title' => 'required|max:255',
            'date' => 'required',
            'description' => 'required',
            'thumbnail' => 'image|file',
        ]);
        try {
            $validatedData['date'] = date('Y-m-d', strtotime($request->date));
            $validatedData['created_by'] = auth()->user()->id;
            $validatedData['sector_id'] = $request->sector_id;
            $validatedData['seen'] = 0;

            News::create($validatedData);
            $status = 'success';
            $message = 'Berhasil Membuat Organisasi';
        } catch (\Exception $exception) {
            // dd($exception);
            $status = 'error';
            $message = 'Gagal Membuat Organisasi';
        }

        return redirect('/admin/publication/news')->with($status, $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        try {
            $news_content = Storage::disk('local')->get($news->file);
        } catch (\Exception $exception) {
            $news_content = Storage::disk('local')->get('public/uploads/news/news.html');
        }
        return view('pages.news.detail', [
            'page' => $news->title,
            'news' => $news,
            'news_content' => $news_content
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        if( $this->role == 'User Sector' ){
            $sectors = Sector::where('id', $this->sector_id)->get();
        } else {
            $sectors = Sector::all();
        }
        return view('pages.news.form', [
            'page' => 'Edit Berita',
            'news' => $news,
            'action' => '/admin/publication/news/' . $news->id,
            'news_content' => file_get_contents(\storage_path('app/'.$news->file)),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'thumbnail' => 'image|file',
        ]);
        $slug = \Str::slug($request->title, '-');
        $validatedData['slug'] = $slug;

        if($request->date) {
            $validatedData['date'] = date('Y-m-d', strtotime($request->date));
        }
        
        if( $request->file('thumbnail') ){
            $validatedData['thumbnail'] = $request->file('thumbnail')->store('images/publish/news');
        }
        
        $path = $news->file;
        
        if( Storage::disk('local')->put($path, $request->news) ){
            $validatedData['file'] = $path;
        }

        try {
            News::where('id', $news->id)->update($validatedData);
            $status = 'success';
            $message = 'Berhasil Mengupdate Berita';
        } catch (\Exception $exception) {
            $status = 'error';
            $message = 'Gagal Mengupdate Berita';
        }

        return redirect('/admin/publication/news')->with($status, $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        News::destroy($news->id);
        return redirect('/admin/publication/news')->with('success', 'Berhasil');
    }
}
