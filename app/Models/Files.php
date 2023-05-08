<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    use HasFactory;
    protected $table = 'files';
    protected $fillable = [
        'name',
        'path',
        'type',
        'size'
    ];
    public function events()
    {
        return $this->belongsToMany(Events::class,'events_files','files_id','events_id');
    }
}
