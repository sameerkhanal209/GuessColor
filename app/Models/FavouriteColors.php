<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavouriteColors extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'colorhex',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class, "user_id");
    }

    protected $table = 'favourite_color';
}
