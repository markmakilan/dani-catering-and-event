<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'service_id', 'no_of_pax', 'inclusions', 'status'];

    public function service() {
        return $this->belongsTo(Service::class);
    }
}
