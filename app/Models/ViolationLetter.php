<?php

namespace App\Models;

use App\Models\Violation;
use App\Models\AttachmentLetter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViolationLetter extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function violations() {
        return $this->hasMany(Violation::class, 'letter_id');
    }
    public function attachment_letters() {
        return $this->hasMany(AttachmentLetter::class, 'letter_id');
    }
}
