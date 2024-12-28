<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Urls extends Model
{
    use HasFactory;
    protected $table = 'urls';
    public $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
      'id',
      'video_quantity',
      'url',
      'type',
      'media_id'
    ];
}
