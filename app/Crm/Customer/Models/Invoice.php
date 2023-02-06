<?php

namespace Crm\Customer\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    
    protected $fillable=[
        'title',
        'discount',
        'price',
        'customerId',
        'details'
    ];
}
