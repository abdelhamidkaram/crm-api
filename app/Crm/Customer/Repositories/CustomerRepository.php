<?php

namespace Crm\Customer\Repositories;

use Crm\Base\BaseRepository\BaseRepository;
use Crm\Customer\Models\customer;

class CustomerRepository extends BaseRepository
{
    public function __construct(Customer $customer)
    {
        $this->setModel($customer);
    }


    
}
