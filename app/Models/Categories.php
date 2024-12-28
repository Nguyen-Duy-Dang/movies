<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    protected $table = 'categories';
    public $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
      'id',
      'name',
      'created_at'
    ];
    public function movies()
    {
        return $this->hasMany(Movies::class, 'id_category'); // Sử dụng model Movies
    }
}
