<?php

namespace AppBundle\Infrastructure\Repository;

use AppBundle\Domain\Entity\User;
use AppBundle\Domain\RepositoryInterface\UserRepositoryInterface;
use Doctrine\ORM\EntityRepository;

class UserRepository extends EntityRepository implements UserRepositoryInterface
{
    public function listUsers()
    {
        return $this->_em
            ->createQueryBuilder()
            ->select('u')
            ->from('Domain:User', 'u')
            ->getQuery()
            ->getArrayResult();
    }

    public function addUser(User $user)
    {
        $this->_em->persist($user);
    }

    public function removeUser(User $user)
    {
        $this->_em->remove($user);
    }

//    public function listUserNotes(User $user)
//    {
//        return $this->_em
//            ->createQueryBuilder()
//            ->select('')
//    }

    public function getUserReference($userId)
    {
        return $this->_em->getReference($this->_entityName, $userId);
    }

}