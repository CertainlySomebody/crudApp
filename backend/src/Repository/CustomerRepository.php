<?php

namespace App\Repository;

use App\Entity\Customer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Customer>
 *
 * @method Customer|null find($id, $lockMode = null, $lockVersion = null)
 * @method Customer|null findOneBy(array $criteria, array $orderBy = null)
 * @method Customer[]    findAll()
 * @method Customer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CustomerRepository extends ServiceEntityRepository implements CustomerRepositoryInterface
{
    public function __construct(
        ManagerRegistry $registry,
        private EntityManagerInterface $entityManager
    ) {
        parent::__construct($registry, Customer::class);
    }

    public function getAllCustomers(): array
    {
        return $this->findAll();
    }

    public function getTotalCustomers(): int
    {
        return $this->count([]);
    }

    public function getCustomerById(int $id): Customer|null
    {
        return $this->findOneBy(['id' => $id]);
    }

    public function getCustomerByEmail(string $email): array
    {
        return $this->findBy(['email' => $email]);
    }
}
