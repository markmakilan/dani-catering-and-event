<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'addons' => 'object',
        'customize' => 'object',
    ];

    public function transactionNumber()
    {
        return 'TRN' . str_pad($this->id, 9, '0', STR_PAD_LEFT);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function reservation()
    {
        return $this->hasOne(Reservation::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
