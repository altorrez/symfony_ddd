<?php

namespace AppBundle\Infrastructure;

use AppBundle\Application\PersistenceInterface;
use Doctrine\ORM\EntityManager;

class DoctrinePersistence implements PersistenceInterface
{
    /**
     * @var EntityManager
     */
    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function persist($object)
    {
        $this->entityManager->persist($object);
    }

    public function remove($object)
    {
        $this->entityManager->remove($object);
    }

    public function flush()
    {
        $this->entityManager->flush();
    }

}