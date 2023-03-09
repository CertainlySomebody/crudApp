<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Customer;

interface CustomerRepositoryInterface
{
    public function getAllCustomers(): array;

    public function getTotalCustomers(): int;

    public function getCustomerById(int $id): Customer|null;

    public function getCustomerByEmail(string $email): array;
}
