<?php

namespace AppBundle\Infrastructure\Repository;

use AppBundle\Domain\Entity\Note;
use AppBundle\Domain\RepositoryInterface\NoteRepositoryInterface;
use Doctrine\ORM\EntityRepository;

class NoteRepository extends EntityRepository implements NoteRepositoryInterface
{
    public function addNote(Note $note)
    {
        $this->_em->persist($note);
    }

    public function remoteNote(Note $note)
    {
        $this->_em->remove($note);
    }

    // TODO investigate proper use of what to do here
    public function updateNote(Note $note)
    {
        if (false == $note->hasId()) {
            $this->_em->merge($note);
        }
    }

    public function getNoteReference($noteId)
    {
        return $this->_em->getReference($this->_entityName, $noteId);
    }

}