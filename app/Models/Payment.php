<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public function designer()
{
    return $this->belongsTo(User::class, 'designer_id');
}

}
