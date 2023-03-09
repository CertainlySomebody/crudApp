<?php

namespace App\Controller;

use App\Repository\CustomerRepositoryInterface;
use App\Service\CustomerServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class CustomerController extends AbstractController
{
    public function __construct(
        private CustomerRepositoryInterface $customerRepository,
        private CustomerServiceInterface    $customerService,
        public SerializerInterface          $serializer
    ) {
    }

    #[Route(path: "/customers/add", name: "create_customer", methods: "POST")]
    public function add(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        if (empty($data['firstName']) || empty($data['lastName']) || empty($data['email']) || empty($data['phoneNumber'])) {
            throw new NotFoundHttpException('Argument is bad');
        }

        $this->customerService->saveCustomer($data);

        return new JsonResponse(['status' => 'Customer has been added!', 'code' => '202'], Response::HTTP_ACCEPTED);
    }

    #[Route(path: "/customers/update/{id}", name: "update_customer", methods: "PUT")]
    public function edit(int $id, Request $request)
    {
        $customer = $this->customerRepository->getCustomerById($id);
        $data = json_decode($request->getContent(), true);

        if (empty($customer)) {
            throw new NotFoundHttpException('Record not found');
        }

        empty($data['firstName']) ?: $customer->setFirstName($data['firstName']);
        empty($data['lastName']) ?: $customer->setLastName($data['lastName']);
        empty($data['email']) ?: $customer->setEmail($data['email']);
        empty($data['phoneNumber']) ?: $customer->setPhoneNumber($data['phoneNumber']);

        $updateCustomer = $this->customerService->editCustomer($customer);
        ;

        return new JsonResponse($updateCustomer->toArray(), Response::HTTP_OK);
    }

    #[Route(path: "/customers/{id}", name: "get_customer", methods: "GET")]
    public function get(int $id)
    {
        $customer = $this->customerRepository->getCustomerById($id);

        $data = [
            'id'            => $customer->getId(),
            'firstName'     => $customer->getFirstName(),
            'lastName'      => $customer->getLastName(),
            'email'         => $customer->getEmail(),
            'phoneNumber'   => $customer->getPhoneNumber()
        ];

        return new JsonResponse($data, Response::HTTP_OK);
    }

    #[Route(path: "/customers", name: "get_customers", methods: "GET")]
    public function getAll(): JsonResponse
    {
        $customers = $this->customerRepository->getAllCustomers();
        $data = [];

        foreach ($customers as $customer) {
            $data[] = [
                'id'            => $customer->getId(),
                'firstName'     => $customer->getFirstName(),
                'lastName'      => $customer->getLastName(),
                'email'         => $customer->getEmail(),
                'phoneNumber'   => $customer->getPhoneNumber()
            ];
        }

        return new JsonResponse($data, Response::HTTP_OK);
    }

    #[Route(path: "/customers/delete/{id}", name: "delete_customer", methods: "DELETE")]
    public function delete(int $id): JsonResponse
    {
        $customer = $this->customerRepository->getCustomerById($id);

        if (empty($customer)) {
            throw new NotFoundHttpException('Record not found');
        }

        $this->customerService->deleteCustomer($customer);

        return new JsonResponse(['status' => 'Customer removed!', 'code' => '202'], Response::HTTP_OK);
    }
}
