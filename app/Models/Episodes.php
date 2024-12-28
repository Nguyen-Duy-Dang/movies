<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episodes extends Model
{
    use HasFactory;
    protected $table = 'episodes';
    public $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
      'id',
      'title',
      'description',
      'video_url',
      'thumbnail',
      'release_year',
      'id_movie',
      'duration',
      'created_at'
    ];

   
}
