<?php

namespace App\Observers;

use App\Models\Gallery;
use App\Models\News;
use App\Models\Policy;
use App\Models\SectorContact;
use App\Models\Sector;
use App\Models\User;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;

class SectorObserver
{
    protected $key = 'sector_id';

    public function retrieved(Sector $sector)
    {
        // ketika memanggil data dari database (index)
        // dd('from observe retrieved');
    }

    public function creating(Sector $sector)
    {
        $request = Request::all();
        if( $request ){
            $image_structure = Request::file('structure');
            $icon = Request::file('icon');
            $slug = \Str::slug($sector->name, '-');
            
            $filename = $slug . '.html';
            
            $sector->slug = $slug;
            if( $image_structure ){
                $sector->structure = $image_structure->store('images/structures');
            }
            if( $icon ){
                $sector->icon = $icon->store('images/configs');
            }
            if( Storage::disk('local')->put("public/uploads/sectors/programs/$filename", $request['program']) ){
                $sector->program = "public/uploads/sectors/programs/$filename";
            }
            if( Storage::disk('local')->put("public/uploads/sectors/jobs/$filename", $request['job']) ){
                $sector->job     = "public/uploads/sectors/jobs/$filename";
            }
            if( Storage::disk('local')->put("public/uploads/sectors/purposes/$filename", $request['purpose']) ){
                $sector->purpose = "public/uploads/sectors/purposes/$filename";
            }
        }
        // dd( $sector );
    }

    public function created(Sector $sector)
    {
        // ketika selesai created
        // dd('from observe created');
    }

    public function restoring(Sector $sector)
    {
        // dd('from observe restoring');
    }

    public function restored(Sector $sector)
    {
        // dd('from observe restored');
    }

    public function updating(Sector $sector)
    {
        // dd('from observe updating');
        $this->upload( $sector );
    }

    public function updated(Sector $sector) 
    {
        // dd('from observe updated');
    }

    public function saving(Sector $sector)
    {
        // dd('from observe saving');
        // $this->upload( $sector );
    }
    
    public function saved(Sector $sector)
    {
        // dd('from observe saved');
    }
    
    public function deleting(Sector $sector)
    {
        try {
            Gallery::where($this->key, $sector->id)->delete();
            News::where($this->key, $sector->id)->delete();
            Policy::where($this->key, $sector->id)->delete();
            User::where($this->key, $sector->id)->delete();
            
            SectorContact::where($this->key, $sector->id)->delete();
        } catch (\Exception $exception) {
            $message = 'Gagal Menghapus "' . $sector->name;
        }
    }

    public function deleted(Sector $sector)
    {
        try {
            if( $sector->structure != 'images/sectors/structures/structures.png' ){
                Storage::delete( $sector->structure );
            }
            if( $sector->program != 'public/uploads/sectors/programs/program.html' ){
                unlink( \storage_path( 'app/' . $sector->program ) );
            }
            if( $sector->job != 'public/uploads/sectors/jobs/job.html' ){
                unlink( \storage_path( 'app/' . $sector->job ) );
            }
            if( $sector->purpose != 'public/uploads/sectors/purposes/purpose.html' ){
                unlink( \storage_path( 'app/' . $sector->purpose ) );
            }
        } catch (\Exception $exception) {
            $message = 'Gagal Menghapus File "' . $sector->name;
        }
    }
}
