<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdkarUserInteraction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'adkar_id',
        'liked',
        'repeat_count',
    ];

    /**
     * العلاقة مع جدول الأذكار
     */
    public function adkar()
    {
        return $this->belongsTo(Adkar::class, 'adkar_id');
         return $this->belongsTo(Adkar::class);
    }

    /**
     * العلاقة مع المستخدم
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
