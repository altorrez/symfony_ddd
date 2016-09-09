<?php

namespace AppBundle\Domain\Entity;

use Doctrine\Common\Collections\ArrayCollection;

class User
{
    /**
     * @var string
     */
    protected $id;
    /**
     * @var string
     */
    protected $name;
    /**
     * @var ArrayCollection
     */
    protected $notes;

    public function __construct($name)
    {
        $this->name = $name;
        $this->notes = new ArrayCollection();
    }

    public function addNote(Note $note)
    {
        $this->notes->add($note);
    }

    public function getNotes()
    {
        return $this->notes->toArray();
    }

    public function getId()
    {
        return $this->id;
    }
}