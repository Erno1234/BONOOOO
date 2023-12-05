<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participates extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'event_id',
        'present',
    ];

    protected function setKeysForSaveQuery($query)
    {
        $query
            ->where('user_id', '=', $this->getAttribute('user_id'))
            ->where('event_id', '=', $this->getAttribute('event_id'))
            ->where('present', '=', $this->getAttribute('present'));
        return $query;
    }

    public function agency(){
        return $this->hasMany(Agency::class, 'agency_id', 'agency_id');
    }

    public function event(){
        return $this->hasMany(Event::class, 'event_id', 'event_id');
    }
}
