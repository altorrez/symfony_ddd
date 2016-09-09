<?php

namespace AppBundle\View\Controller;

use AppBundle\Infrastructure\Utility\ErrorLayer;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class NoteController extends Controller
{
    /**
     * @var ErrorLayer
     */
    private $errorLayer;

    public function __construct(ErrorLayer $errorLayer)
    {
        $this->errorLayer = $errorLayer;
    }

    public function homeAction()
    {
        return $this->render('default/home.html.twig');
    }
}