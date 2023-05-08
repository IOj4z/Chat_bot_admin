<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->belongsTo(User::class,'member_id');
    }
    public function searchUsers()
    {
        return $this->belongsTo(User::class,'to_member_id');
    }
}
