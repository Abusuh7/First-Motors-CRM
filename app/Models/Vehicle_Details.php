<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle_Details extends Model
{
    use HasFactory;

    protected $table = 'vehicle_details';
    protected $fillable = [
        'previous_owner_id',
        'vehicle_type', //Luxury, Sedan, Convertible, JDM, Sports and Hyper
        'vehicle_make', //Brand
        'vehicle_model',
        'vehicle_year_manufactured',
        'vehicle_year_registered',
        'vehicle_ownership', //First, Second, Third, Fourth, Fifth, Sixth, Seventh, Eighth, Ninth, Tenth Owner
        'vehicle_color',
        'vehicle_mileage',
        'vehicle_transmission', //Automatic or Manual
        'vehicle_fuel_type', //Petrol or Diesel
        'vehicle_condition', //New or Used
        'vehicle_license_plate',
        'vehicle_thumbnail', //Main image
        'vehicle_images', //Other images
        'vehicle_description',
        'vehicle_cost_price',
        'vehicle_selling_price',
        'profit',
        'availability', //Available or Sold




    ];

    public function previous_owner_details()
    {
        return $this->belongsTo(Previous_Owner_Details::class);
    }
}
