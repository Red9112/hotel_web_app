<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Customer extends Model
{
  
    use HasFactory;

    public $table = 'customers';
 
    

    protected $fillable = [
        'name',
        'adress',
        'cne',
        'num_passport',
        'gender',
        'user_id',
        
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
}
