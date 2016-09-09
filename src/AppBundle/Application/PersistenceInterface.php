<?php

namespace AppBundle\Application;

interface PersistenceInterface
{
    public function persist($object);
    public function remove($object);
    public function flush();
}