<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Watch_laters extends Model
{
    use HasFactory;
    protected $table = 'watch_laters';
    public $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
      'id',
      'id_movie',
      'id_user',
      'created_at'
    ];
    public function movie(){
      return $this->belongsTo(Movies::class, 'id_movie');
  }

}
