<?php

namespace Crm\Customer\Services;

use Crm\Customer\Requests\CreateCustomer;
use Crm\Customer\Models\customer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CustomersExport
{
    public function index(string $type)
    {
      return customer::all();
    }

}