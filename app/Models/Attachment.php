<?php

namespace App\Models;

use App\Models\Violation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attachment extends Model
{
    use HasFactory;
    protected $guarded = [ 'id' ];

    public function violation() {
        return $this->belongsTo(Violation::class);
    }
}
