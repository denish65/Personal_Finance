<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SerialNumberModel extends Model
{
    //

    use HasFactory;

    // Table name (optional if it follows Laravel's convention)
    protected $table = 'serial_numbers';

    // Fields we want to allow mass assignment for
    protected $fillable = ['serial_number'];

    // Disable timestamps as we don't need them for this use case
    // public $timestamps = false;
}
