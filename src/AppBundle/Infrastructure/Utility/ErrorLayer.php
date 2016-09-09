<?php

namespace AppBundle\Infrastructure\Utility;

class ErrorLayer
{
    /**
     * @var string
     */
    private $lastError;

    /**
     * @param string $error
     */
    public function setError($error)
    {
        $this->lastError = $error;
    }

    public function getLastError()
    {
        return $this->lastError;
    }
}