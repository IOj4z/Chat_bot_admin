<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventMember extends Model
{
    use HasFactory;

    public function events()
    {
        return $this->belongsToMany(Events::class, 'event_members','events_id','events_id'  );
    }
    public function members()
    {
        return $this->belongsToMany(Members::class, 'event_members','members_id','members_id');
    }
    public function users()
    {
        return $this->belongsToMany(User::class,'members','user_id' );
    }
}
