<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply_comments extends Model
{
    use HasFactory;
    protected $table = 'reply_comments';
    public $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
      'id',
      'id_movie',
      'id_user',
      'id_comment',
      'name_reply',
      'content',
      'created_at'
    ];
    
    public function user(){
      return $this->belongsTo(User::class, 'id_user'); 
    }
    
    public function user_reply(){
      return $this->belongsTo(User::class, 'id_user_reply'); 
    }

    public function comment(){
        return $this->belongsTo(Comments::class, 'id_comment');
    }
}
