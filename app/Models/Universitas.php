<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Universitas extends Model
{
    use HasFactory, HasUuids;

    public $timestamps = false;

    protected $primaryKey = 'uuid',
            $guarded = [],
            $table = 'universitas';

    public function alumni()
    {
        return $this->belongsToMany(Alumni::class, 'alumni_universitas')
                    ->withPivot('jurusan');
    }
}
