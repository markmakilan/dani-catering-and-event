<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Package extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $dates = ['deleted_at'];
    
    protected $casts = [
        'addons' => 'object',
        'customize' => 'object',
    ];

    public function service() {
        return $this->belongsTo(Service::class);
    }
}
