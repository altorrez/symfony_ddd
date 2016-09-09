<?php

namespace AppBundle\Application\DTO;

use AppBundle\Domain\Entity\User;

class NoteDTO
{
    /**
     * @var User
     */
    public $user;
    /**
     * @var string
     */
    public $text;
}