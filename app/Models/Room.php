<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Image;
class Room extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'type_id',
        'room_status_id',
        'number',
        'capacity',
        'price',
        'view',
    ];


    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function roomStatus()
    {
        return $this->belongsTo(RoomStatus::class);
    }

    public function image()
    {
        return $this->hasMany(Image::class);
    }
    

    public function getFirstImage(){
        
        if (count($this->image) > 0) {
            return $this->image->first()->getRoomImage();
        } 
        return asset('http://localhost:8000/storage/Images/default-room.png');
    
    }
   
}
