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
        'teacher'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
