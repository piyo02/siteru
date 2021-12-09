<?php

namespace App\Models;

use App\Models\User;
use App\Models\Sector;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gallery extends Model
{
    use HasFactory;
    protected $guarded = [ 'id' ];

    public function sector() {
        return $this->belongsTo(Sector::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
