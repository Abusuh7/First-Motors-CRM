<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
    use HasFactory;

    protected $table = 'notifications';
    protected $fillable = [
        'booking_id',
        'notification_type',
        'notification_message',
        'notification_status',
    ];

    public function bookings()
    {
        return $this->belongsTo(Bookings::class);
    }
}
