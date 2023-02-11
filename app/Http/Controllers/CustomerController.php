<?php

namespace App\Http\Controllers;

use Crm\Customer\Requests\CreateCustomer;
use Crm\Customer\Services\CustomerServices;
use Illuminate\Http\Request;


class CustomerController extends Controller
{

  private CustomerServices $customerServices;

  public function __construct(CustomerServices $customerServices)
  {
    $this->customerServices  = $customerServices;
  }


  public function index()
  {
    return $this->customerServices->index();
  }

  public function create(CreateCustomer $request)
  {
    app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();
    return $this->customerServices->create($request);
  }

  public function show($customerId)
  {
    return $this->customerServices->show($customerId);
  }

  public function update(Request $request, $customerId)
  {
    return $this->customerServices->update($request, $customerId);
  }

  public function delete($customerId)
  {
    return $this->customerServices->delete($customerId);
  }
}
