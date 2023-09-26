<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookings extends Model
{
    use HasFactory;

    protected $table = 'bookings';
    protected $fillable = [
        'user_id',
        'vehicle_id',
        'booking_type', //Test Drive or Purchase (Should pay 10% of the vehicle selling price)
        'booking_date',
        'booking_time',
        'booking_status', //Pending, Approved, Rejected, Completed
        'booking_amount', //only for purchase (Should pay 10% of the vehicle selling price)
        'booking_mode', //Online or Offline
        'payment_reference_image', //Payment Reference Number/Image (Only for online)
        'booking_payment_status', //Paid or Unpaid

    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function vehicle_details()
    {
        return $this->belongsTo(Vehicle_Details::class, 'vehicle_id');
    }
}
