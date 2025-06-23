<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revision extends Model
{
    use HasFactory;

    protected $fillable = ['room_pack_id', 'notes', 'created_by'];

    public function roomPack()
    {
        return $this->belongsTo(RoomPack::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
