<?php

namespace Crm\Customer\Repositories;

use Crm\Base\BaseRepository\BaseRepositoryWithCustomerId;
use Crm\Customer\Models\Invoice;

class InvoiceRepository extends BaseRepositoryWithCustomerId
{
    
    public function __construct(Invoice $invoice)
    {
        $this->setModel($invoice);
    }





}
