<?php

namespace Crm\Customer\Services;

use Crm\Customer\Requests\CreateCustomer;
use Crm\Customer\Repositories\CustomerRepository;
use Illuminate\Http\Request;


class CustomerServices
{

  private CustomerRepository $customerRepository;
   
    public function __construct(CustomerRepository $customerRepository)
    {
      $this->customerRepository = $customerRepository ;
    }

    public function index()
    {
      return $this->customerRepository->all();
    }


    public function create(CreateCustomer $request )
    {
      return $this->customerRepository->create(['name'=>$request->name]);
    }

    public function update(Request $request , $id )
        
    {
      return $this->customerRepository->update(['name'=>$request->name], $id);
    }

    public function delete($id)
    {
     
      return $this->customerRepository->delete($id);
    }

    public function show($id)
    {
     return $this->customerRepository->show($id);
    }


    
}