<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
    use HasFactory;
    protected $table = 'notifications';
    public $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
      'id',
      'content',
      'id_send_user',
      'id_receive_user',
      'status',
      'created_at',
      'isDeleted'
    ];

    public function receive_user(){
      return $this->belongsTo(User::class, 'id_receive_user'); 
    }
    public function send_user(){
      return $this->belongsTo(User::class, 'id_send_user'); 
    }
}
