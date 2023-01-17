<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Room;

class Image extends Model
{
    use HasFactory;
    protected $fillable = [
        'room_id',
        'url'
    ];
    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function getRoomImage(){
        return Storage::url($this->url);
    }

   

  
}
