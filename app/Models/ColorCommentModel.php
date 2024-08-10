<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColorCommentModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment',
        'colorhex',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class, "user_id");
    }

    protected $table = 'comments';
}
