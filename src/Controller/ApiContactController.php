<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Repository\ContactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class ApiContactController extends AbstractController
{
    #[Route('/apicontact/{contact_id}', name: 'app_api_contact')]
    public function launchAPI($contact_id, ContactRepository $contactRepository ): JsonResponse
    {

        $contact = $contactRepository->findOneById($contact_id);
        return new JsonResponse(['contact' => (array)$contact]);
    }
}

