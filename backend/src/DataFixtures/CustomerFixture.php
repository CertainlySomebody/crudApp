<?php

namespace App\DataFixtures;

use App\Entity\Customer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class CustomerFixture extends Fixture
{
    private const dummyCount = 30;

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for ($i = 0; $i < self::dummyCount; $i++) {
            $customer = new Customer();
            $customer->setFirstName($faker->firstName());
            $customer->setLastName($faker->lastName());
            $customer->setEmail($faker->email());
            $customer->setPhoneNumber($faker->phoneNumber());
            $manager->persist($customer);
        }

        $manager->flush();
    }
}
