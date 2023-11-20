<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reticket extends Model
{
    use HasFactory;

    protected $fillable = ['seat_number', 'name', 'tent'];
}
