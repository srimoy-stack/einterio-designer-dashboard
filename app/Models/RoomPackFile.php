<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomPackFile extends Model
{
    use HasFactory;

    protected $fillable = ['room_pack_id', 'type', 'file_path', 'external_link'];

    public function roomPack()
    {
        return $this->belongsTo(RoomPack::class);
    }
}

