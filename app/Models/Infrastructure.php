<?php

namespace App\Models;

use App\Models\Config;
use App\Models\Sector;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Infrastructure extends Model
{
    use HasFactory;
    protected $guarded = [ 'id' ];

    public function sector() {
        return $this->belongsTo(Sector::class);
    }

    public function config() {
        return $this->belongsTo(Config::class);
    }
}
