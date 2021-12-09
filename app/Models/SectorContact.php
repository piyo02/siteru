<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectorContact extends Model
{
    use HasFactory;
    protected $table = 'sector_contact';
    protected $guarded = [ 'id' ];

    public function sector() {
        return $this->belongsTo(Sector::class);
    }
    public function contact_type() {
        return $this->belongsTo(ContactType::class);
    }
}
