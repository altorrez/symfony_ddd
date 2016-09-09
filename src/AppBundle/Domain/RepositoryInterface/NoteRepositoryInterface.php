<?php

namespace AppBundle\Domain\RepositoryInterface;

use AppBundle\Domain\Entity\Note;

interface NoteRepositoryInterface
{
    public function addNote(Note $note);
    public function remoteNote(Note $note);
    public function updateNote(Note $note);
    public function getNoteReference($noteId);
}