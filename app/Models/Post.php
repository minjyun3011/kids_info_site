<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'kid_name',
        'category',
        'title',
        'evaluation',
        'old_evaluation',
        'teacher',
        'detail'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
