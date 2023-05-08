<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Members extends Model
{
    use HasFactory;
    public function events()
    {
        return $this->belongsToMany(Events::class, 'events_members');
    }
    public function users($id)
    {
        return User::findOrFail($id);
    }

}
