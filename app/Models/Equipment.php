<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;

    protected $table = 'equipments';

    protected $fillable = ['serial_number', 'equipment_name', 'equipment_price', 'date_purchased', 'equipment_description', 'status', 'image'];
}
    