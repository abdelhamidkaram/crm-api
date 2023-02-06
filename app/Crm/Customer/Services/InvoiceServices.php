<?php

namespace Crm\Customer\Services;

use Crm\Customer\Repositories\InvoiceRepository;
use Illuminate\Http\Request;

class InvoiceServices
{
    private InvoiceRepository $invoiceRepository;

    public function __construct(InvoiceRepository $invoiceRepository)
    {
        $this->invoiceRepository = $invoiceRepository;
    }

    public function all($customerId)
    {
        return $this->invoiceRepository->all($customerId);
    }

    public function create(Request $request)
    {
        return $this->invoiceRepository->create([
         'title'=>$request->title,
         'discount'=>$request->discount,
         'price'=>$request->price,
         'customerId'=>$request->customerId,
         'details'=>$request->details
        ]);
    }

    public function show(Request $request, $invoiceId, $customerId)
    {
        return $this->invoiceRepository->show($invoiceId, $customerId);
    }

    public function delete(Request $request, $invoiceId, $customerId)
    {
        return $this->invoiceRepository->delete($invoiceId, $customerId);
    }

    public function update(Request $request, $data, $invoiceId, $customerId)
    {
        return $this->invoiceRepository->update($data, $invoiceId, $customerId);
    }
}
