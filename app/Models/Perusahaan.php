<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    use HasFactory, HasUuids;
    public $timestamps = false;

    protected $primaryKey = 'uuid',
            $guarded = [],
            $table = 'perusahaan';

    public function alumni()
    {
        return $this->belongsToMany(Alumni::class, 'alumni_perusahaan')
                    ->withPivot('wirausaha');
    }
}
