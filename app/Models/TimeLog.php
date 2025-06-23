<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeLog extends Model
{
    public function designer()
{
    return $this->belongsTo(User::class, 'designer_id');
}

public function roomPack()
{
    return $this->belongsTo(RoomPack::class);
}

}
