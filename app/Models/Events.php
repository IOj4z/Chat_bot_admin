<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Events extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['name','desc','program','date','speakers_id','cover'];
    protected $dates = ['deleted_at'];
    public function members()
    {
        return $this->belongsToMany(Members::class, 'events_members');
    }
    public function users()
    {
        return $this->hasOneThrough(User::class, Members::class,'user_id','id');
    }
    public function files()
    {
        return $this->belongsToMany(Files::class);
    }
    public function status()
    {
        return $this->belongsTo(Status::class );
    }
    public function speakers()
    {
        return $this->belongsToMany(Speakers::class);
    }
}
