<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;
    protected $table = 'comments';
    public $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
      'id',
      'id_movie',
      'id_user',
      'content',
      'created_at'
    ];
    
    public function user(){
      return $this->belongsTo(User::class, 'id_user'); 
    }

    public function reply_comments(){
      return $this->hasMany(Reply_comments::class, 'id_comment'); 
    }

    public function movie()
    {
        return $this->belongsTo(Movies::class, 'id_movie');
    }
}
