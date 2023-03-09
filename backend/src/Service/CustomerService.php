<?php

namespace App\Service;

use App\Entity\Customer;
use App\Repository\CustomerRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Config\Definition\Exception\DuplicateKeyException;

class CustomerService implements CustomerServiceInterface
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private CustomerRepositoryInterface $repository
    ) {
    }

    public function saveCustomer(array $customer): void
    {
        $createCustomer = new Customer();

        $createCustomer->setFirstName($customer['firstName']);
        $createCustomer->setLastName($customer['lastName']);
        $createCustomer->setEmail($customer['email']);
        $createCustomer->setPhoneNumber($customer['phoneNumber']);

        if (!empty($this->repository->getCustomerByEmail($customer['email']))) {
            throw new DuplicateKeyException('Customer with this email already exists');
        }

        $this->entityManager->persist($createCustomer);
        $this->entityManager->flush();
    }

    public function deleteCustomer(Customer $customer): void
    {
        $this->entityManager->remove($customer);
        $this->entityManager->flush();
    }

    public function editCustomer(Customer $customer): Customer
    {
        $this->entityManager->persist($customer);
        $this->entityManager->flush();

        return $customer;
    }
}
