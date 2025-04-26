<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    use HasFactory, HasUuids;

    public $timestamps = false;

    protected $primaryKey = 'uuid',
            $guarded = [],
            $table = 'alumni';

    public function pengguna(){
        return $this->belongsTo(User::class);
    }

    public function universitas(){
        return $this->belongsToMany(Universitas::class, 'alumni_universitas');
    }

    public function perusahaan(){
        return $this->belongsToMany(Perusahaan::class, 'alumni_perusahaan')
        ->withPivot('wirausaha');
    }
}
