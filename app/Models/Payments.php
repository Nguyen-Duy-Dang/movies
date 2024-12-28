<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    use HasFactory;
    protected $table = 'payments';
    public $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
      'id',
      'id_sub',
      'amount',
      'date',
      'method',
      'status'
    ];

    public function subscription()
    {
        return $this->belongsTo(Subscription::class, 'id_sub'); 
    }
}
