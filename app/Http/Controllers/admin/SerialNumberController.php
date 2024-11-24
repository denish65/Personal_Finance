<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SerialNumberController extends Controller
{
    //
    /**
     * Generate and return the next serial number.
     *
     * @return string
     */
    public function generateNextSerialNumber()
    {
        // Get the last serial number from the database
        $lastSerial = SerialNumber::latest()->first(); // Get the latest entry
        
        // If no serial number exists, start from 'SN-00001'
        if (!$lastSerial) {
            $nextSerialNumber = 'SN-00001';
        } else {
            // Extract the last number from the serial (after the prefix)
            $lastSerialNumber = (int) substr($lastSerial->serial_number, 3); 
            // Increment the serial number and format it as SN-00002, SN-00003, etc.
            $nextSerialNumber = 'SN-' . str_pad($lastSerialNumber + 1, 5, '0', STR_PAD_LEFT);
        }

        // Store the new serial number in the database
        SerialNumber::create(['serial_number' => $nextSerialNumber]);

        // Return the new serial number
        return $nextSerialNumber;
    }
}
