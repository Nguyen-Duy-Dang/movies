<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'id_movie',
        'id_user',
        'content',
        'status',
        'isDeleted',
    ];

    // Hàm kiểm tra bình luận đã xóa mềm
    public function scopeNotDeleted($query)
    {
        return $query->where('isDeleted', 0);
    }
    // Thiết lập quan hệ với Movie và User (nếu cần)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
