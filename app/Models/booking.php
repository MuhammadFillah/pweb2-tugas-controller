<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = ['booking_code', 'user_id', 'field_id', 'booking_date', 'total_amount', 'status'];

    public function user() { return $this->belongsTo(User::class); }
    public function field() { return $this->belongsTo(Field::class); }
    public function details() { return $this->hasMany(BookingDetail::class); }
    public function payment() { return $this->hasOne(Payment::class); }
    public function cancellation() { return $this->hasOne(Cancellation::class); }
    public function review() { return $this->hasOne(Review::class); }
}