<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movies extends Model
{
    use HasFactory;
    protected $table = 'movies';
    public $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
      'id',
      'title',
      'description',
      'thumbnail',
      'cast',
      'director',
      'release_year',
      'id_category',
      'country',
      'views',
      'status',
      'duration',
      'created_at'
    ];
    public function category(){
        return $this->belongsTo(Categories::class, 'id_category'); 
    }
    public function get_episodes(){
        return $this->hasMany(Episodes::class, 'id_movie'); 
    }
    public function likes(){
        return $this->hasMany(Likes::class, 'id_movie'); 
    }
}
