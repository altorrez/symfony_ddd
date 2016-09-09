<?php

namespace AppBundle\Application\Service;

use AppBundle\Application\DTO\NoteDTO;
use AppBundle\Application\PersistenceInterface;
use AppBundle\Domain\Entity\User;
use AppBundle\Domain\RepositoryInterface\NoteRepositoryInterface;
use AppBundle\Infrastructure\Utility\ErrorLayer;

class NoteService
{
    /**
     * @var PersistenceInterface
     */
    private $persistence;
    /**
     * @var NoteRepositoryInterface
     */
    private $noteRepository;
    /**
     * @var ErrorLayer
     */
    private $errorLayer;

    public function __construct(ErrorLayer $errorLayer)
    {
        $this->errorLayer = $errorLayer;
    }

    public function setPersistence(PersistenceInterface $persistence)
    {
        $this->persistence = $persistence;
    }

    public function setNoteRepository(NoteRepositoryInterface $noteRepository)
    {
        $this->noteRepository = $noteRepository;
    }

    public function saveNewNote(User $user, $text)
    {
        // Create real object NOTE: is DTO really necessary here?
        $noteDTO = new NoteDTO();
        $noteDTO->user = $user;
        $noteDTO->text = $text;

        $note = DTOFactoryService::createNote($noteDTO);

        // persist to database
        $this->noteRepository->addNote($note);
        try {
            $this->persistence->flush();
        } catch (\Exception $e) {
            $this->errorLayer->setError($e->getMessage());
            return false;
        }

        return $note;
    }

    public function removeNote($noteId)
    {
        $noteReference = $this->noteRepository->getNoteReference($noteId);
        $this->noteRepository->remoteNote($noteReference);
        try {
            $this->persistence->flush();
        } catch (\Exception $e) {
            $this->errorLayer->setError($e->getMessage());
            return false;
        }
        return true;
    }
}