<?php

namespace App\Models;

use App\Models\Role;
use App\Models\Sector;
use App\Models\Gallery;
use App\Models\News;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'address',
        'email',
        'image',
        'is_active',
        'name',
        'password',
        'phone',
        'username',
        'role_id',
        'sector_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role() {
        return $this->belongsTo(Role::class);
    }

    public function sector() {
        return $this->belongsTo(Sector::class);
    }

    public function news() {
        return $this->hasMany(News::class, 'created_by');
    }

    public function galleries() {
        return $this->hasMany(Gallery::class, 'created_by');
    }

    public function test() {
        DB::transaction(function () {
            DB::update('update users set votes = 1');
        
            DB::delete('delete from posts');
        }, 5);

        // DB::beginTransaction();
        // DB::rollBack();
        // DB::commit();
    }
}
