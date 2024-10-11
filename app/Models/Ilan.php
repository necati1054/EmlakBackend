<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ilan extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id', 'ilanable_id', 'ilanable_type'];


    // Kullanıcı ilişkisi
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Polimorfik ilişki
    public function ilanable()
    {
        return $this->morphTo();
    }
}
