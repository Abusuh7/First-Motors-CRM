<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sold_Vehicles extends Model
{
    use HasFactory;

    protected $table = 'sold_vehicles';
    protected $fillable = [
        'booking_id',
        'vehicle_id',
        'buyer_fname',
        'buyer_lname',
        'buyer_email',
        'buyer_phone',
        'buyer_gender',
        'sold_date',
        'sold_amount',
        'sold_status', //Pending Delivery Or Completed
        'delivery_date',
        //staff who sold the vehicle
        'staff_id', // Staff ID
        'staff_commission', // 0.005% of the vehicle sold amount


    ];

    public function bookings()
    {
        return $this->belongsTo(Bookings::class, 'booking_id');
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class, 'staff_id');
    }

    public function vehicle_details()
    {
        return $this->belongsTo(Vehicle_Details::class, 'vehicle_id');
    }

}
