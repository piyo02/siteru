<?php

namespace App\Observers;

use App\Models\Gallery;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;

class GalleryObserver
{
    public function creating(Gallery $gallery)
    {
        $request = Request::all();
        $image_thumbnail = Request::file('thumbnail');
        $slug = \Str::slug($gallery->title, '-');
        
        $filename = $slug . '.html';
        $gallery->slug = $slug;
        if( $image_thumbnail ){
            $gallery->thumbnail = $image_thumbnail->store('images/publish/galleries');
        }
        $path = "public/uploads/galleries/$filename";
        if( Storage::disk('local')->put($path, $request['file_gallery']) ){
            $gallery->file = $path;
        }
    }

    
    public function deleted(Gallery $gallery)
    {
        try {
            if( $gallery->thumbnail != 'images/publish/galleries/galleries.jpg' ){
                Storage::delete( $gallery->thumbnail );
            }
            if( $gallery->file != 'public/uploads/galleries/galleries.html' ){
                unlink( \storage_path( 'app/' . $gallery->file ) );
            }
        } catch (\Exception $exception) {
            $message = 'Gagal Menghapus File "' . $gallery->title;
        }
    }
}
