<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class News extends Model
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
