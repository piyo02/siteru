<?php

namespace App\Models;

use App\Models\News;
use App\Models\User;
use App\Models\Policy;
use App\Models\Gallery;
use App\Models\SectorContact;
use App\Models\Infrastructure;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sector extends Model
{
    protected $key_id = 'sector_id';
    use HasFactory;
    protected $fillable = [ 'structure', 'name', 'explanation', 'vision', 'mission', 'slug' ];
    public $error;

    public function sector_contacts() {
        return $this->hasMany(SectorContact::class, 'sector_id');
    }
    public function news() {
        return $this->hasMany(News::class);
    }
    public function infrastructures() {
        return $this->hasMany(Infrastructure::class);
    }
    public function policies() {
        return $this->hasMany(Policy::class);
    }
    public function galleries() {
        return $this->hasMany(Gallery::class);
    }
    public function users() {
        return $this->hasMany(User::class, 'sector_id');
    }
    public function delete() {
        DB::beginTransaction();
        
        try {
            SectorContact::where('sector_id', $this->id)->delete();

            parent::delete();
        } catch (\Exception $exception) {
            DB::rollback();
            throw $exception;
        }

        DB::commit();
    }
}
