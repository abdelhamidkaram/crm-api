<?php

namespace App\Http\Controllers;

use Crm\Customer\Services\InvoiceServices;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    private InvoiceServices $invoiceServices;

    public function __construct(InvoiceServices $invoiceServices)
    {
        $this->invoiceServices = $invoiceServices;
    }

    public function index($customerId)
    {
        return $this->invoiceServices->all($customerId);
    }

    public function create(Request $request)
    {
      return $this->invoiceServices->create($request);
    }

        public function show(Request $request ,$customerId ,  $invoiceId )
    {
      return $this->invoiceServices->show($request ,$invoiceId , $customerId);
    }

        public function delete(Request $request ,$customerId ,  $invoiceId )
    {
      return $this->invoiceServices->delete($request ,$invoiceId , $customerId);
    }

        public function update(Request $request ,$customerId ,  $invoiceId )
    {
      return $this->invoiceServices->update($request , $request->toArray(),$invoiceId , $customerId);
    }

    
}
