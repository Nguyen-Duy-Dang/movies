<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;
    protected $table = 'subscriptions';
    public $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
      'id',
      'id_user',
      'start_date',
      'end_date',
      'payment_status'
    ];

    public function subscription_plan()
    {
        return $this->belongsTo(Subscription_plans::class, 'id_plan'); 
    }
}
