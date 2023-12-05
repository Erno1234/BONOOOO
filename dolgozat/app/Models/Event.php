<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $primaryKey = 'event_id';

    protected $fillable = [
        'date',
        'agency_id',
        'limit',
    ];

    public function agency()
    {
        return $this->hasMany(Agency::class, 'agency_id', 'agency_id');
    }

    public function participate()
    {
        return $this->hasMany(Participates::class, 'event_id', 'event_id');
    }
}
