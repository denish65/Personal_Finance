<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExpenseModel extends Model
{
    //
   protected $fillable = ['first_name','last_name','date','payment_type','reference_image','expense_note','location','item_name','payment_for','payment_status'];

   protected $table ='expenses';
}
