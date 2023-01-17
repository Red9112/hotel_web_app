<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    //protected $table='posts';
    protected $fillable=['title','description','active','slug','user_id'];
    
    public function comment(){
        return $this->hasMany('App\Models\Comment');
    }
    
public static function boot(){
    parent::boot();
    static::deleting(function(Post $post){
     //dd('deleting');
$post->comment()->delete();
    });
    static::restoring(function(Post $post){
        $post->comment()->restore();

});

}
use HasFactory;
}










    

