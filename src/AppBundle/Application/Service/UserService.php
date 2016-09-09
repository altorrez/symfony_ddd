<?php

namespace AppBundle\Application\Service;

use AppBundle\Application\DTO\UserDTO;
use AppBundle\Application\PersistenceInterface;
use AppBundle\Domain\RepositoryInterface\UserRepositoryInterface;
use AppBundle\Infrastructure\Utility\ErrorLayer;

class UserService
{
    /**
     * @var PersistenceInterface
     */
    private $persistence;
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;
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

    public function setUserRepository(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function saveNewUser($name)
    {
        $userDTO = new UserDTO();
        $userDTO->name = $name;

        $user = DTOFactoryService::createUser($userDTO);
        $this->userRepository->addUser($user);
        try {
            $this->persistence->flush();
        } catch (\Exception $e) {
            $this->errorLayer->setError($e->getMessage());
            return false;
        }
        return $user;
    }

    public function removeUser($userId)
    {
        $user = $this->userRepository->getUserReference($userId);
        $this->userRepository->removeUser($user);
        try {
            $this->persistence->flush();
        } catch (\Exception $e) {
            $this->errorLayer->setError($e->getMessage());
            return false;
        }
        return true;
    }
}