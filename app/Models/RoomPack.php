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
    public function revisions()
    {
        return $this->hasMany(Revision::class);
    }
    
    public static function createForDesigner(array $data): self
    {
        return self::create([
            'designer_id' => auth()->id(),
            'title' => $data['title'],
        ]);
    }

}
