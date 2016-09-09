<?php

namespace AppBundle\Application\Service;

use AppBundle\Application\DTO\NoteDTO;
use AppBundle\Application\DTO\UserDTO;
use AppBundle\Domain\Entity\Note;
use AppBundle\Domain\Entity\User;

class DTOFactoryService
{
    public static function createUser(UserDTO $userDTO)
    {
        return new User($userDTO->name);
    }

    public static function createNote(NoteDTO $noteDTO)
    {
        return new Note($noteDTO->user, $noteDTO->text);
    }
}