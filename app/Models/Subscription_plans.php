<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription_plans extends Model
{
    use HasFactory;
    protected $table = 'subscription_plans';
    public $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
      'id',
      'name',
      'duration',
      'price',
      'created_at'
    ];
    public function subscriptions()
    {
        return $this->hasMany(Subscription::class, 'id_plan'); 
    }
}
