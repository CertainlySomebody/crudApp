<?php

namespace App\Service;

use App\Entity\Customer;

interface CustomerServiceInterface
{
    public function saveCustomer(array $customer): void;

    public function deleteCustomer(Customer $customer): void;

    public function editCustomer(Customer $customer): Customer;
}
