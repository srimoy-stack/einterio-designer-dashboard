<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomPack extends Model
{
    use HasFactory;

    protected $fillable = ['designer_id', 'title', 'quality_tier', 'sop_followed'];

    public function files()
    {
        return $this->hasMany(RoomPackFile::class);
    }

    public function designer()
    {
        return $this->belongsTo(User::class, 'designer_id');
    }
}
