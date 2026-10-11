<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    protected $fillable = ['category_id', 'field_code', 'name', 'status'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function rates()
    {
        return $this->hasMany(FieldRate::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}