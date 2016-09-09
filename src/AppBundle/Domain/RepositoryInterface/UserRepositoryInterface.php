<?php

namespace AppBundle\Domain\RepositoryInterface;

use AppBundle\Domain\Entity\User;

interface UserRepositoryInterface
{
    public function listUsers();
    public function addUser(User $user);
    public function removeUser(User $user);
//    public function listUserNotes(User $user);
    public function getUserReference($userId);
}