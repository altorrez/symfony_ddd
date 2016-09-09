<?php

namespace AppBundle\Domain\Entity;

class Note
{
    /**
     * @var int
     */
    protected $id;
    /**
     * @var User
     */
    protected $user;
    /**
     * @var string
     */
    protected $text;

    /**
     * Note constructor.
     * @param User $user
     * @param string $text
     */
    public function __construct(User $user, $text)
    {
        $this->user = $user;
        $this->text = $text;
    }

    /**
     * @param string $text
     */
    public function editNote($text)
    {
        $this->text = $text;
    }

    /**
     * @return bool
     */
    public function hasId()
    {
        return (null !== $this->id);
    }

    public function getId()
    {
        return $this->id;
    }
}