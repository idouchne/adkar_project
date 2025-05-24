<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adkar extends Model
{
    use HasFactory;

    protected $table = 'adkar';

    protected $fillable = [
        'category',
        'text',
        'repeat',
        'source',
        'explanation',
    ];

    /**
     * علاقة: أذكار يمكن أن يكون لها تفاعلات مستخدمين.
     */
    public function interactions()
    {
        return $this->hasMany(AdkarUserInteraction::class, 'adkar_id');
    }
}
