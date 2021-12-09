<?php

namespace App\Models;

use App\Models\Attachment;
use App\Models\ViolationLetter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Violation extends Model
{
    use HasFactory;
    protected $guarded = [ 'id' ];

    // public function letter() {
    //     return $this->belongsTo(ViolationLetter::class);
    // }
    public function attachments() {
        return $this->hasMany(Attachment::class, 'violation_id');
    }
}
