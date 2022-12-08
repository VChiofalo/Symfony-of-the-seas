<?php

namespace App\EventSubscriber;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityUpdatedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class EasyAdminSubscriber implements EventSubscriberInterface
{

    private $entityManager;
    private $userPasswordHasher;

    public function __construct(EntityManagerInterface $entityManager, UserPasswordHasherInterface $userPasswordHasher)
    {
        $this->entityManager = $entityManager;
        $this->userPasswordHasher = $userPasswordHasher;
    }

    // Récupération de l'utilisateur en utilisant les évènements
    public static function getSubscribedEvents()
    {
        return [
            BeforeEntityPersistedEvent::class => ['addUser'],
            BeforeEntityUpdatedEvent::class => ['updateUser'],
        ];
    }

    // Edition d'un utilisateur en utilisant la fonction de hashage du password
    public function updateUser(BeforeEntityUpdatedEvent $event)
    {
        $entity = $event->getEntityInstance();

        if (!($entity instanceof User)) {
            return;
        }
        $this->setPassword($entity);
    }

    // Ajout d'un utilisateur en utilisant la fonction de hashage du password
    public function addUser(BeforeEntityPersistedEvent $event)
    {
        $entity = $event->getEntityInstance();


        if (!($entity instanceof User)) {
            return;
        }
        $this->setPassword($entity);
    }

    /**
     * @param User $entity
     */

    // Hash le password
    public function setPassword(User $entity): void
    {
        $pass = $entity->getPassword();

        $entity->setPassword(
            $this->userPasswordHasher->hashPassword(
                $entity,
                $pass
            )
        );
        $this->entityManager->persist($entity);
        $this->entityManager->flush();
    }

}