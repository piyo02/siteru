<?php

namespace App\Models;

use App\Models\ViolationLetter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttachmentLetter extends Model
{
    use HasFactory;
    protected $guarded = [ 'id' ];

    public function letter() {
        return $this->belongsTo(ViolationLetter::class);
    }
}
