<?php

namespace App\Observers;

use App\Models\News;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;

class NewsObserver
{
    public function creating(News $news)
    {
        $request = Request::all();
        $image_thumbnail = Request::file('thumbnail');
        $slug = \Str::slug($news->title, '-');
        
        $filename = $slug . '.html';
        $news->slug = $slug;
        if( $image_thumbnail ){
            $news->thumbnail = $image_thumbnail->store('images/publish/news');
        }
        $path = "public/uploads/news/$filename";
        if( Storage::disk('local')->put($path, $request['news']) ){
            $news->file = $path;
        }
    }

    public function updated(News $news)
    {
        dd('updated');
    }

    
    public function deleted(News $news)
    {
        try {
            if( $news->thumbnail != 'images/publish/news/news.jpg' ){
                Storage::delete( $news->thumbnail );
            }
            if( $news->file != 'public/uploads/news/news.html' ){
                unlink( \storage_path( 'app/' . $news->file ) );
            }
        } catch (\Exception $exception) {
            $message = 'Gagal Menghapus File "' . $news->title;
        }
    }
}
