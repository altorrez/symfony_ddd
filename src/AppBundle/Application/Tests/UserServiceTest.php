<?php

namespace AppBundle\Application\Tests;

use AppBundle\Domain\Entity\Note;
use AppBundle\Domain\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UserServiceTest extends WebTestCase
{
    public function testCreateUserAndNote()
    {
        $client = static::createClient();
        $container = $client->getContainer();

        $userService = $container->get('user.service');
        $noteService = $container->get('note.service');
        $errorLayer = $container->get('error.layer');

        $user = $userService->saveNewUser('Andrew');
        self::assertInstanceOf(User::class, $user);

        $note = $noteService->saveNewNote($user, 'Sample Note');
        self::assertInstanceOf(Note::class, $note);

        self::assertEquals(true, $noteService->removeNote($note->getId()), $errorLayer->getLastError());
        // NOTE: issue with cascade remove** The above should NOT be necessary...
        self::assertEquals(true, $userService->removeUser($user->getId()), $errorLayer->getLastError());
    }
}